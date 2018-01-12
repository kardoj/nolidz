<?php

require_once __DIR__ . '/../config/DbConfig.php';

// Provides a way to make db calls
class Db
{
	private $connection = null;

	function __construct()
	{
		$host = DbConfig::HOST;
		$db = DbConfig::DB;
		$user = DbConfig::USER;
		$pass = DbConfig::PASS;

		$this->connection = pg_connect("host=$host dbname=$db user=$user password=$pass")
			or die('Could not connect: ' . pg_last_error());
	}

	function __destruct()
	{
		pg_close($this->connection);
	}
	
	// $sql is a string which contains $1 to $n parameters and
	// $param_array must supply the correct amount of string parameters in the correct order.
	// Zero parameters are also allowed
	function execute_params($sql, $param_array)
	{
		$q = pg_prepare($this->connection, 'query', $sql);
		$q = pg_execute($this->connection, 'query', $param_array);
		$rows = array();
                while($r = pg_fetch_array($q, null, PGSQL_ASSOC))
                {
                        array_push($rows, $r);
                }
		pg_free_result($q);

		return $rows;
	}
	
	// $sql is a string with no parameters
	function execute($sql)
	{
		$q = pg_query($sql) or die('Query failed: ' . pg_last_error());
		$rows = array();
		while($r = pg_fetch_array($q, null, PGSQL_ASSOC))
		{
			array_push($rows, $r);
		}
		pg_free_result($q);

		return $rows;
	}
}
