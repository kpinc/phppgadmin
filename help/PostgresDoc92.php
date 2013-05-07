<?php

/**
 * Help links for PostgreSQL 9.2 documentation
 *
 * Test this with an url like:
 * http://localhost/phpPgAdmin-dev/help.php?action=browse&server=localhost:5432:allow
 * Click on all the links to be sure they work.
 * Pay particular attention to the anchors.
 */

$this->help_base = sprintf($GLOBALS['conf']['help_base'], '9.2');

$this->help_page = array(

	'pg.database'			=> 'managing-databases.html',
	'pg.database.create'	=> array('sql-createdatabase.html', 'manage-ag-createdb.html'),
	'pg.database.alter'		=> 'sql-alterdatabase.html',
	'pg.database.drop' 		=> array('sql-dropdatabase.html', 'manage-ag-dropdb.html'),

	'pg.admin.analyze'	=> 'sql-analyze.html',
	'pg.admin.vacuum'	=> 'sql-vacuum.html',

	'pg.cast'			=> array('sql-expressions.html#SQL-SYNTAX-TYPE-CASTS','sql-createcast.html'),
	'pg.cast.create'		=> 'sql-createcast.html',
	'pg.cast.drop'			=> 'sql-dropcast.html',

	'pg.column.add'			=> array('ddl-alter.html#AEN2706', 'sql-altertable.html'),
	'pg.column.alter'		=> array('ddl-alter.html','sql-altertable.html'),
	'pg.column.drop'		=> array('ddl-alter.html#AEN2722', 'sql-altertable.html'),

	'pg.constraint'			=> 'ddl-constraints.html',
	'pg.constraint.add'		=> 'ddl-alter.html#AEN2733',
	'pg.constraint.check'		=> 'ddl-constraints.html#AEN2410',
	'pg.constraint.drop'		=> 'ddl-alter.html#AEN2742',
	'pg.constraint.foreign_key'	=> 'ddl-constraints.html#DDL-CONSTRAINTS-FK',
	'pg.constraint.primary_key'	=> 'ddl-constraints.html#AEN2493',
	'pg.constraint.unique_key'	=> 'ddl-constraints.html#AEN2470',

	'pg.conversion'			=> 'multibyte.html',
	'pg.conversion.alter'		=> 'sql-alterconversion.html',
	'pg.conversion.create'		=> 'sql-createconversion.html',
	'pg.conversion.drop'		=> 'sql-dropconversion.html',

	'pg.domain'			=> 'extend-type-system.html#AEN51685',
	'pg.domain.alter'		=> 'sql-alterdomain.html',
	'pg.domain.create'		=> 'sql-createdomain.html',
	'pg.domain.drop'		=> 'sql-dropdomain.html',

	'pg.fts'				=> 'textsearch.html',

	'pg.ftscfg'				=> 'textsearch-intro.html#TEXTSEARCH-INTRO-CONFIGURATIONS',
	'pg.ftscfg.example'		=> 'textsearch-configuration.html',
	'pg.ftscfg.drop'		=> 'sql-droptsconfig.html',
	'pg.ftscfg.create'		=> 'sql-createtsconfig.html',
	'pg.ftscfg.alter'		=> 'sql-altertsconfig.html',

	'pg.ftsdict'			=> 'textsearch-dictionaries.html',
	'pg.ftsdict.drop'		=> 'sql-droptsdictionary.html',
	'pg.ftsdict.create'		=> array('sql-createtsdictionary.html', 'sql-createtstemplate.html'),
	'pg.ftsdict.alter'		=> 'sql-altertsdictionary.html',

	'pg.ftsparser'			=> 'textsearch-parsers.html',

	'pg.function'			=> array('xfunc.html', 'functions.html', 'sql-expressions.html#SQL-EXPRESSIONS-FUNCTION-CALLS'),
	'pg.function.alter'		=> 'sql-alterfunction.html',
	'pg.function.create'		=> 'sql-createfunction.html',
	'pg.function.create.c'		=> array('xfunc-c.html','sql-createfunction.html'),
	'pg.function.create.internal'	=> array('xfunc-internal.html','sql-createfunction.html'),
	'pg.function.create.pl'		=> array('xfunc-sql.html','xfunc-pl.html','sql-createfunction.html'),
	'pg.function.drop'		=> 'sql-dropfunction.html',

	'pg.group'			=> 'user-manag.html',
	'pg.group.alter'		=> array('sql-altergroup.html','user-manag.html'),
	'pg.group.create'		=> 'sql-creategroup.html',
	'pg.group.drop'			=> 'sql-dropgroup.html',

	'pg.index'			=> 'indexes.html',
	'pg.index.cluster'		=> 'sql-cluster.html',
	'pg.index.drop'			=> 'sql-dropindex.html',
	'pg.index.create'		=> 'sql-createindex.html',
	'pg.index.reindex'		=> 'sql-reindex.html',

	'pg.language'			=> 'xplang.html',
	'pg.language.alter'		=> 'sql-alterlanguage.html',
	'pg.language.create'		=> 'sql-createlanguage.html',
	'pg.language.drop'		=> 'sql-droplanguage.html',

	'pg.opclass'			=> 'indexes-opclass.html',
	'pg.opclass.alter'		=> 'sql-alteropclass.html',
	'pg.opclass.create'		=> 'sql-createopclass.html',
	'pg.opclass.drop'		=> 'sql-dropopclass.html',

	'pg.operator'			=> array('xoper.html', 'functions.html', 'sql-expressions.html#SQL-EXPRESSIONS-OPERATOR-CALLS'),
	'pg.operator.alter'		=> 'sql-alteroperator.html',
	'pg.operator.create'		=> 'sql-createoperator.html',
	'pg.operator.drop'		=> 'sql-dropoperator.html',

	'pg.pl'				=> 'xplang.html',
	'pg.pl.plperl'			=> 'plperl.html',
	'pg.pl.plpgsql'			=> 'plpgsql.html',
	'pg.pl.plpython'		=> 'plpython.html',
	'pg.pl.pltcl'			=> 'pltcl.html',

	'pg.privilege'			=> 'ddl-priv.html',
	'pg.privilege.grant'		=> 'sql-grant.html',
	'pg.privilege.revoke'		=> 'sql-revoke.html',

	'pg.process'			=> 'monitoring.html',

	'pg.role'				=> 'user-manag.html',
	'pg.role.create'		=> array('sql-createrole.html','database-roles.html'),
	'pg.role.alter'			=> array('sql-alterrole.html','role-attributes.html'),
	'pg.role.drop'			=> array('sql-droprole.html','database-roles.html'),

	'pg.rule'			=> 'rules.html',
	'pg.rule.create'		=> 'sql-createrule.html',
	'pg.rule.drop'			=> 'sql-droprule.html',

	'pg.schema'			=> 'ddl-schemas.html',
	'pg.schema.alter'		=> 'sql-alterschema.html',
	'pg.schema.create'		=> array( 'sql-createschema.html','ddl-schemas.html#DDL-SCHEMAS-CREATE'),
	'pg.schema.drop'		=> 'sql-dropschema.html',
	'pg.schema.search_path'		=> 'ddl-schemas.html#DDL-SCHEMAS-PATH',
	
	'pg.sequence'			=> 'functions-sequence.html',
	'pg.sequence.alter'		=> 'sql-altersequence.html',
	'pg.sequence.create'		=> 'sql-createsequence.html',
	'pg.sequence.drop'		=> 'sql-dropsequence.html',

	'pg.sql'			=> array('sql.html','sql-commands.html'),
	'pg.sql.insert'			=> 'sql-insert.html',
	'pg.sql.select'			=> 'sql-select.html',
	'pg.sql.update'			=> 'sql-update.html',

	'pg.table'			=> 'ddl-basics.html',
	'pg.table.alter'		=> 'sql-altertable.html',
	'pg.table.create'		=> 'sql-createtable.html',
	'pg.table.drop'			=> 'sql-droptable.html',
	'pg.table.empty'		=> 'sql-truncate.html',

	'pg.tablespace'			=> 'manage-ag-tablespaces.html',
	'pg.tablespace.alter'		=> 'sql-altertablespace.html',
	'pg.tablespace.create'		=> 'sql-createtablespace.html',
	'pg.tablespace.drop'		=> 'sql-droptablespace.html',

	'pg.trigger'			=> 'triggers.html',
	'pg.trigger.alter'		=> 'sql-altertrigger.html',
	'pg.trigger.create'		=> 'sql-createtrigger.html',
	'pg.trigger.drop'		=> 'sql-droptrigger.html',

	'pg.type'			=> array('xtypes.html','datatype.html','extend-type-system.html'),
	'pg.type.alter'			=> 'sql-altertype.html',
	'pg.type.create'		=> 'sql-createtype.html',
	'pg.type.drop'			=> 'sql-droptype.html',

	'pg.user.alter'			=> array('sql-alteruser.html','role-attributes.html'),
	'pg.user.create'		=> array('sql-createuser.html','database-roles.html'),
	'pg.user.drop'			=> array('sql-dropuser.html','database-roles.html'),

	'pg.variable'			=> 'runtime-config.html',

	'pg.view'			=> 'tutorial-views.html',
	'pg.view.alter'			=> array('sql-createview.html','sql-altertable.html'),
	'pg.view.create'		=> 'sql-createview.html',
	'pg.view.drop'			=> 'sql-dropview.html',
	
	'pg.aggregate'			=> array('xaggr.html', 'tutorial-agg.html', 'functions-aggregate.html', 'sql-expressions.html#SYNTAX-AGGREGATES'),
	'pg.aggregate.create'	=> 'sql-createaggregate.html',
	'pg.aggregate.drop'		=> 'sql-dropaggregate.html',
	'pg.aggregate.alter'	=> 'sql-alteraggregate.html',
	
	'pg.server' => 'admin.html',

	'pg.user'	=> 'user-manag.html',

	'pg.locks' 	=> 'view-pg-locks.html'
);

?>
