<?php


/**
 * Help links for PostgreSQL 7.4 documentation
 */

include('./help/PostgresDoc80.php');

class PostgresDoc74 extends PostgresDoc80 {
	function __construct() {
		parent::__construct();

		$this->help_base = sprintf($GLOBALS['conf']['help_base'], '7.4');


		$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2118';
		$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2127';

		$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2134';
		$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN1898';

		$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2143';
		$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN1975';
		$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN1953';

		$this->help_page['pg.domain'] = 'extend-type-system.html#AEN28761';

		$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1602';

		$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1573';
	}
}
?>
