<?php
	$test_title = 'Import/Export tests';

	if (isset($_GET['run'])) {
		global $lang;
		require('../config.test.php');
		require('../testBuilder.class.php');
		/**
		 * 1/ Create a "simple" view
		 * 2/ Check that the view has an import tab
		 * 3/ Import should allow simple view data to be replaced
		 * 4/ Create a "complex" view
		 * 5/ Check the complex view does not have an import tab
		 * The problem here is that step 5 can't be done since
		 * ppa does not allow views to have triggers.
		 * 6/ Give the complex view a insert trigger (fixme)
		 * Since step 5 is not complete can't do step 6
		 * // 7/ The complex view should now have an import tab (enableme)
		 * // PPA can't deny insert on a view so steps 7 and 8 can't be done.
		 * // 8/ Deny insert on the view to a user (todo)
		 * // 9/ The user should not see an import tab on the view (todo)
		 * 8/ Drop the views
		 * 9/ Check that student table has an import tab.
		 * 10/ Check that student table import tab is displayed only when
		 *    user has import permissions.
		 *    Note: The problem with the way this is written is that
		 *    $user does not have insert permission on the student table,
		 *    yet these test assume the user does have permission.
		 *    This is not a problem, and it's left this way because it's				*    more robust to begin by revoking permission regardless,
		 *    but it does leave $user with insert permission.
		 *    So, this process may need revision.
		 **/
		$t = new TestBuilder($test_title,
			'Test import and export features'
		);

		$t->login($admin_user, $admin_user_pass);

	/** 1 **/
		$t->addComment('1. Create "simple" view of student table');
		$t->clickAndWait("link={$lang['strdatabases']}");
		$t->clickAndWait("link={$testdb}");
		$t->clickAndWait("link={$lang['strschemas']}");
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("link={$lang['strcreateview']}");
		$t->type('formView', 'student_view');
		$t->type('formDefinition', 'SELECT * FROM student');
		$t->type('formComment', 'Another name for the student table');
		$t->clickAndWait("//input[@value='Create']");
		$t->assertText("//p[@class='message']", "{$lang['strviewcreated']}");

	/** 2 **/
		$t->addComment('2. Does the "simple" view have an "import" tab?');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("link=student_view");
		$t->clickAndWait("link=student_view");
		if ($t->data->major_version < 9.3)
		   	$t->assertErrorOnNext("Element link={$lang['strimport']} not found");
		$t->clickAndWait("link={$lang['strimport']}");
		// More specificity could be had with something like:
		// $t->assertText("//table[@class='tabs']//td//*[text()='{$lang['strimport']}']", "{$lang['strimport']}");

	/** 3 **/
		if ($t->data->major_version < 9.3) {
		   	$t->addComment('3. Replace data on import skipped for PG < 9.3');
		} else {
		  	$t->addComment('3. Can simple view data be replaced on import?');
			$t->click("//input[@name='replace']");
		}

	/** 4 **/
		$t->addComment('4. Create "complex" view of student table');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("link={$lang['strcreateview']}");
		$t->type('formView', 'complex_view');
		$t->type('formDefinition', 'SELECT s1.id, s1.name AS name, s2.name AS name2 FROM student AS s1, student AS s2 WHERE s2.id = s1.id');
		$t->type('formComment', 'A "complex" view into the student table');
		$t->clickAndWait("//input[@value='Create']");
		$t->assertText("//p[@class='message']", "{$lang['strviewcreated']}");

	/** 5 **/
		$t->addComment('5. The "complex" view should not have an "import" tab');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("link=complex_view");
		$t->assertErrorOnNext("Element link={$lang['strimport']} not found");
		$t->clickAndWait("link={$lang['strimport']}");

	/** 6 **/
		$t->addComment('6. Give the "complex" view an insert trigger');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strfunctions']}");
		$t->clickAndWait("link={$lang['strcreateplfunction']}");
		$t->type('name=formFunction', 'complex_view_func');
		$t->select('name=formReturns', 'value=trigger');
		$t->select('name=formLanguage', 'value=plpgsql');
		$t->click("//img[@title='{$lang['strargremove']}']");
		$t->assertAlert("{$lang['strargnoargs']}");
		$t->type('name=formDefinition', 'BEGIN
  RETURN NULL;
END;
');
		$t->type('name=formComment', 'Trigger function that does nothing.');
		$t->clickAndWait("//input[@type='submit'][@value='{$lang['strcreate']}']");
		$t->assertText("//p[@class='message']", "{$lang['strfunctioncreated']}");

		// This is where we attach the function to the complex_view
		// as a trigger.  But ppa does not yet support this.


	/** 7 **/
		/*****    NEEDS TRIGGER ABOVE
		$t->addComment('7. The "complex" view should now have an "import" tab');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("link=complex_view");
		$t->clickAndWait("link={$lang['strimport']}");
		*****/

	/** 8 **/
		$t->addComment('8. Drop the views and functions');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("//tr/td/a[text()='student_view']/../../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText("//p[@class='message']", $lang['strviewdropped']);

		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strviews']}");
		$t->clickAndWait("//tr/td/a[text()='complex_view']/../../td/a[text()='{$lang['strdrop']}']");
		$t->clickAndWait('drop');
		$t->assertText("//p[@class='message']", $lang['strviewdropped']);

		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strfunctions']}");
		$t->clickAndWait('link=complex_view_func ()');
		$t->clickAndWait("link={$lang['strdrop']}");
		$dropstr = sprintf($lang['strconfdropfunction'], 'complex_view_func()');
		$t->assertText("//p[text()='{$dropstr}']", $dropstr);
		$t->clickAndWait("//input[@type='submit'][@name='drop']");
		$t->assertText("//p[@class='message']", $lang['strfunctiondropped']);

	/** 9 **/
		$t->addComment('9. Check student table has an import tab');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strtables']}");
		$t->clickAndWait('link=student');
		$t->clickAndWait("link={$lang['strimport']}");

	/** 10 **/
		$t->addComment('10. Check import tab displayed only given insert permission');
		$t->s_echo("Revoke {$user}'s insert permission on student table");
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strtables']}");
		$t->clickAndWait('link=student');
		$t->clickAndWait("link={$lang['strprivileges']}");
		$t->clickAndWait("link={$lang['strrevoke']}");
		$t->select('name=username[]', "value={$user}");
		$t->click("//input[@id='privilege[INSERT]']");
		$t->clickAndWait("//input[@type='submit'][@value='{$lang['strrevoke']}']");
		$t->assertText("//p[@class='message']", $lang['strgranted']);

		$t->s_echo("Log out {$admin_user}");
		$t->logout();

		$t->s_echo("Log in {$user}");
		$t->login($user, $user_pass);

		$t->s_echo('Check import tab not displayed');
		$t->clickAndWait("link={$lang['strdatabases']}");
		$t->clickAndWait("link={$testdb}");
		$t->clickAndWait("link={$lang['strschemas']}");
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strtables']}");
		$t->clickAndWait('link=student');
		$t->assertErrorOnNext("Element link={$lang['strimport']} not found");
		$t->clickAndWait("link={$lang['strimport']}");

		$t->s_echo("Log out {$user}");
		$t->logout();

		$t->s_echo("Log in {$admin_user}");
		$t->login($admin_user, $admin_user_pass);

		$t->s_echo("Restore {$user}'s insert permission on student table");
		$t->clickAndWait("link={$lang['strdatabases']}");
		$t->clickAndWait("link={$testdb}");
		$t->clickAndWait("link={$lang['strschemas']}");
		$t->clickAndWait('link=public');
		$t->clickAndWait('link=public');
		$t->clickAndWait("link={$lang['strtables']}");
		$t->clickAndWait('link=student');
		$t->clickAndWait("link={$lang['strprivileges']}");
		$t->clickAndWait("link={$lang['strgrant']}");
		$t->select('name=username[]', "value={$user}");
		$t->click("//input[@id='privilege[INSERT]']");
		$t->clickAndWait("//input[@type='submit'][@value='{$lang['strgrant']}']");
		$t->assertText("//p[@class='message']", $lang['strgranted']);

		$t->logout();
		unset($t);
	}
?>
