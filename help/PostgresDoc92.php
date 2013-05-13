<?php

/**
 * Help links for PostgreSQL 9.2 documentation
 *
 * Test this with an url like:
 * http://localhost/phpPgAdmin-dev/help.php?action=browse&server=localhost:5432:allow
 * Click on all the links to be sure they work.
 * Pay particular attention to the anchors.
 */

include('./help/PostgresDoc.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '9.2');


$this->help_page['pg.column.add'][0] = 'ddl-alter.html#AEN2706';
$this->help_page['pg.column.drop'][0] = 'ddl-alter.html#AEN2722';

$this->help_page['pg.constraint.add'] = 'ddl-alter.html#AEN2733';
$this->help_page['pg.constraint.check'] = 'ddl-constraints.html#AEN2410';
$this->help_page['pg.constraint.drop'] = 'ddl-alter.html#AEN2742';
$this->help_page['pg.constraint.primary_key'] = 'ddl-constraints.html#AEN2493';
$this->help_page['pg.constraint.unique_key'] = 'ddl-constraints.html#AEN2470';

$this->help_page['pg.domain'] = 'extend-type-system.html#AEN51685';

?>
