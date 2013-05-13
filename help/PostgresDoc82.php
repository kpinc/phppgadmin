<?php

/**
 * Help links for PostgreSQL 8.2 documentation
 *
 * $Id: PostgresDoc82.php,v 1.3 2007/11/30 15:27:26 soranzo Exp $
 */

include('./help/PostgresDoc83.php');

class PostgresDoc82 extends PostgresDoc83 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.2');

		$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2275';
		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2291';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2302';
		$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2311';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN36262';

		$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1722';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1693';

		unset($this->help_page['pg.fts']);

		unset($this->help_page['pg.ftscfg']);
		unset($this->help_page['pg.ftscfg.example']);
		unset($this->help_page['pg.ftscfg.drop']);
		unset($this->help_page['pg.ftscfg.create']);
		unset($this->help_page['pg.ftscfg.alter']);

		unset($this->help_page['pg.ftsdict']);
		unset($this->help_page['pg.ftsdict.drop']);
		unset($this->help_page['pg.ftsdict.create']);
		unset($this->help_page['pg.ftsdict.alter']);

		unset($this->help_page['pg.ftsparser']);
	}
}
?>
