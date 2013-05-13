<?php

/**
 * Help links for PostgreSQL 9.0 documentation
 *
 * $Id: PostgresDoc84.php,v 1.3 2008/11/18 21:35:48 ioguix Exp $
 */

include('./help/PostgresDoc91.php');

class PostgresDoc90 extends PostgresDoc91 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '9.0');

		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2697';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2708';
		$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN2385';
		$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2717';
		$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2468';
		$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2445';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN45975';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1881';

		$this->help_page['pg.privilege'] = array('privileges.html', $this->help_page['pg.privilege']);
	}
}
?>
