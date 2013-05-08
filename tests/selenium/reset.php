<?php
	/*
	 * Reset the ppa selenium self-test db envionment to it's inital state.
	 *
	 * Delete the test db and the roles used to manipulate it.
	 *
	 * Don't bother to internationalize as Selenium does not pick up the
	 * language either.
	 */

	$_no_db_connection = true; /* load lib.inc.php without trying to connect */

	function ignore_error($dbms, $fn, $errno, $errmsg, $p1=false, $p2=false) {
		return;
	}

	define('ADODB_ERROR_HANDLER','ignore_error');
	require_once('./libraries/lib.inc.php');
	require_once('./classes/database/Connection.php');
	include_once('./themes/themes.php');
	require('./tests/selenium/config.test.php');

    // The alter db test uses this and makes a new db.
	define('ALTERSUFFIX', 'toalter');

	function reset_selftest() {
		// ppa globals
		global $misc;
		// selenium test framework globals
		global $test_servers;
		global $super_user;
		global $super_pass;
		global $testdb;
		global $admin_user;
		global $user;

		// Start the page.
		$misc->printHeader();
		$misc->printBody();

		$altereddb = $testdb . ALTERSUFFIX;

		// Start a table.
		?>
		<h1>Reset PPA Self-Test PG Server State</h1>

		<table>
			<tr>
				<th>Server</th>
				<th>Dropped database <?php echo $testdb; ?></th>
				<th>Dropped database <?php echo $altereddb; ?></th>
				<th>Dropped role <?php echo $admin_user; ?></th>
				<th>Dropped role <?php echo $user; ?></th>
			</tr>
		<?php

		$servers = $misc->getServers();

		/* Loop on the servers given in the conf/config.inc.conf file */
		foreach ($servers as $server) {
			// Is this server in our list of configured servers?
			if (!in_array($server['desc'], $test_servers))
			   	continue;

			// Connect to the server as the superuser.
			$serverid = $server['id'];
			$_REQUEST['server'] = $serverid;

			$serverinfo = $misc->getServerInfo($serverid);
			$serverinfo['username'] = $super_user[$serverinfo['desc']];
			$serverinfo['password'] = $super_pass[$serverinfo['desc']];

			$misc->setServerInfo(null, $serverinfo, $serverid);

			$data = $misc->getDatabaseAccessor($server['defaultdb']);

			// Get rid of the db and the roles used to manipulate it.
			echo '<tr>';
			echo "<td>{$serverinfo['desc']}</td>";

			echo '<td class="tab">';
			if ($data->dropDatabase($testdb) == 0) {
		   	   	echo 'Yes';
			} else {
		   	  	echo 'No';
			}		   
			echo '</td>';

			echo '<td class="tab">';
			if ($data->dropDatabase($altereddb) == 0) {
		   	   	echo 'Yes';
			} else {
		   	  	echo 'No';
			}		   
			echo '</td>';

			echo '<td class="tab">';
			if ($data->dropRole($admin_user) == 0) {
		   	   	echo 'Yes';
			} else {
		   	  	echo 'No';
			}		   
			echo '</td>';

			echo '<td class="tab">';
			if ($data->dropRole($user) == 0) {
		   	   	echo 'Yes';
			} else {
		   	  	echo 'No';
			}		   
			echo '</td>';

			echo "</tr>\n";
		};

		// Finish the table.
		?></table>
		<p><a href="intro.php">Back to the PPA introduction page</a></p>

		<?php

		// Finish the page.
		$misc->printFooter();
	};
