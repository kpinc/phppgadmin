<?php

/**
 * Help links for PostgreSQL 8.3 documentation
 *
 * $Id: PostgresDoc83.php,v 1.3 2008/03/17 21:35:48 ioguix Exp $
 */

include('./help/PostgresDoc84.php');

class PostgresDoc83 extends PostgresDoc84 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.3');

		$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2276';
		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2292';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2312';
		$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1998';
		$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2080';
		$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2058';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN40181';

		$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1719';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1690';
	}
}
?>
