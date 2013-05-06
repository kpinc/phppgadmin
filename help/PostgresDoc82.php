<?php

/**
 * Help links for PostgreSQL 8.2 documentation
 *
 * $Id: PostgresDoc82.php,v 1.3 2007/11/30 15:27:26 soranzo Exp $
 */

include('./help/PostgresDoc83.php');

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '8.2');

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
?>
