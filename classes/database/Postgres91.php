<?php

/**
 * PostgreSQL 9.1 support
 *
 * $Id: Postgres82.php,v 1.10 2007/12/28 16:21:25 ioguix Exp $
 */

include_once('./classes/database/Postgres92.php');

class Postgres91 extends Postgres92 {

	var $major_version = 9.1;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres91($conn) {
		$this->Postgres($conn);
	}

	// Help functions

	function getHelpPages() {
		include_once('./help/PostgresDoc91.php');
		return $this->help_page;
	}

	// Administration functions
	/**
	 * Returns all available process information.
	 * @param $filter             (boolean) When true filter out the process
	 * 		  					  used to query the processes.
	 * @param $database (optional) Find only connections to specified database
	 * @return A recordset
	 */
	function getProcesses($filter, $database = null) {
		if ($database === null)
		   	$whereclause = '';
		else {
			$this->clean($database);
			$whereclause = "datname='{$database}'";
		}

		if ($filter) {
		   	$hash = sha1(rand());
			$hashcol = "'{$hash}' AS hash,";

		   	if ($whereclause !== '')
			   	$whereclause .= ' AND ';
			$whereclause .= "POSITION('{$hash}' IN current_query) = 0";
		} else {
		  	$hashcol = '';
		}

		if ($whereclause !== '')
		   	$whereclause = "WHERE ${whereclause}";

		$sql = "SELECT datname, usename, procpid AS pid, waiting, current_query AS query, query_start
			FROM pg_catalog.pg_stat_activity
			{$whereclause}
			ORDER BY datname, usename, procpid";

		return $this->selectSet($sql);
	}

	// Tablespace functions

	/**
	 * Retrieves information for all tablespaces
	 * @param $all Include all tablespaces (necessary when moving objects back to the default space)
	 * @return A recordset
	 */
	function getTablespaces($all = false) {
		global $conf;

		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation,
                    (SELECT description FROM pg_catalog.pg_shdescription pd WHERE pg_tablespace.oid=pd.objoid AND pd.classoid='pg_tablespace'::regclass) AS spccomment
					FROM pg_catalog.pg_tablespace";

		if (!$conf['show_system'] && !$all) {
			$sql .= ' WHERE spcname NOT LIKE $$pg\_%$$';
		}

		$sql .= " ORDER BY spcname";

		return $this->selectSet($sql);
	}

	/**
	 * Retrieves a tablespace's information
	 * @return A recordset
	 */
	function getTablespace($spcname) {
		$this->clean($spcname);

		$sql = "SELECT spcname, pg_catalog.pg_get_userbyid(spcowner) AS spcowner, spclocation,
                    (SELECT description FROM pg_catalog.pg_shdescription pd WHERE pg_tablespace.oid=pd.objoid AND pd.classoid='pg_tablespace'::regclass) AS spccomment
					FROM pg_catalog.pg_tablespace WHERE spcname='{$spcname}'";

		return $this->selectSet($sql);
	}


	// Capabilities
	function hasUserSignals() { return false; }



}
?>
