<?php

/**
 * Help links for PostgreSQL 8.0 documentation
 *
 * $Id: PostgresDoc80.php,v 1.5 2005/02/16 10:27:44 jollytoad Exp $
 */

include('./help/PostgresDoc81.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.0');

unset($this->help_page['pg.role']);
unset($this->help_page['pg.role.create']);
unset($this->help_page['pg.role.alter']);
unset($this->help_page['pg.role.drop']);

?>
