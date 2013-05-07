<?php

/**
 * Help links for PostgreSQL 8.4 documentation
 *
 * $Id: PostgresDoc84.php,v 1.3 2008/11/18 21:35:48 ioguix Exp $
 */

include('./help/PostgresDoc90.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.4');

$this->help_page['pg.column.add'][0] ='ddl-alter.html#AEN2534';
$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2550';

$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2561';
$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN2256';
$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2570';
$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2338';
$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2316';

$this->help_page['pg.domain'] = 'extend-type-system.html#AEN43721';

$this->help_page['pg.function'][2] = 'sql-expressions.html#AEN1898';

$this->help_page['pg.operator'][2] = 'sql-expressions.html#AEN1869';

?>
