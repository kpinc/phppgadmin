<?php

/**
 * Help links for PostgreSQL 8.1 documentation
 *
 * $Id: PostgresDoc81.php,v 1.3 2006/12/28 04:26:55 xzilla Exp $
 */

include('./help/PostgresDoc82.php');

class PostgresDoc81 extends PostgresDoc82 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.1');

		$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2233';
		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2245';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2256';
		$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1954';
		$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2265';
		$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2038';
		$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2016';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN31585';

		$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1699';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1670';

		$this->help_page['pg.role.create'][2] = 'user-manag.html#DATABASE-ROLES';
		$this->help_page['pg.role.drop'][2] = 'user-manag.html#DATABASE-ROLES';

		$this->help_page['pg.table'] = 'ddl.html#DDL-BASICS';

		$this->help_page['pg.user.create'][1] = 'user-manag.html#DATABASE-ROLES';
		$this->help_page['pg.user.drop'][1] = 'user-manag.html#DATABASE-ROLES';
	}
}
?>
