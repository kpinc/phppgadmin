<?php

/**
 * Help links for PostgreSQL 8.0 documentation
 *
 * $Id: PostgresDoc80.php,v 1.5 2005/02/16 10:27:44 jollytoad Exp $
 */

include('./help/PostgresDoc81.php');

class PostgresDoc80 extends PostgresDoc81 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.0');

		$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2275';
		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2287';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2298';
		$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1936';
		$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2307';
		$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2018';
		$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN1996';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN29459';

		$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1682';

		$this->help_page['pg.group'] = 'groups.html';
		$this->help_page['pg.group.alter'][1] = 'groups.html';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1653';

		$this->help_page['pg.user.alter'][1] = 'user-attributes.html';

		$this->help_page['pg.user.create'][1] = 'user-manag.html#DATABASE-USERS';
		$this->help_page['pg.user.drop'][1] = 'user-manag.html#DATABASE-USERS';

		unset($this->help_page['pg.role']);
		unset($this->help_page['pg.role.create']);
		unset($this->help_page['pg.role.alter']);
		unset($this->help_page['pg.role.drop']);
	}
}
?>
