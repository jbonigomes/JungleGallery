<?php

/***********************************************************************************************************************
 *
 * This class has been adapted from HOE - PHP WITH MySQL
 * Provides an easy interface for issuing queries over a database
 *
 ***********************************************************************************************************************/

class dbHander
{
	// declare the class level variables
	private $host;
	private $username;
	private $password;
	private $schema;
	private $link;
	
	/*
	* The construct
	*
	* @param string $hostIn, server name/address
	* @param string $usernameIn, db username
	* @param string $passwordIn, db password
	* @param string $schemaIn, db name
	*/
	function __construct($hostIn, $usernameIn, $passwordIn, $schemaIn)
	{
		$this->host = $hostIn;
		$this->username = $usernameIn;
		$this->password = $passwordIn;
		$this->schema = $schemaIn;
	}
	
	/*
	* Function to connect from MySql database engine
	* on error, it will exit from application
	*
	* @return void
	*/
	function dbConnect()
	{
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->schema);
		
		// check connection 
		if($this->link->connect_errno)
		{
			exit($this->link->connect_errno);
		}
	}
	
	/*
	* Function to disconnect from MySql database engine
	*
	* @return void
	*/
	function dbDisconnect()
	{
		// free result set 
		$this->link->close();
	}
	
	/*
	* Function to escape sql parameters
	* This function should be called for all parameters on an sql query before issuing any query
	*
	* @param string $param, string to be escaped
	* @return string, escaped string
	*/
	function escapeParam($param)
	{
		// escape the query
		return $this->link->real_escape_string($param);
	}
	
	/*
	* Function to issue a select query over the database
	* accepts sql query and returns data in associative array format
	* on error, it will exit from application
	*
	* @param string $sql, an sql select query
	* @return array, data in associative array format
	*/
	function getData($sql)
	{	
		// declare response array 
		$response = array();
		
		// get results 
		$result = $this->link->query($sql);
		
		// check query results
		if($result === false)
		{
			exit($this->link->error);
		}
		
		// fetch associative array 
		while($row = $result->fetch_assoc())
		{
			$response[] = $row;
		}
		
		// free result set 
		$result->close();
		
		// return response array 
		return $response;
	}
	
	/*
	* Function to issue an insert query over the database
	* accepts sql query and returns the inserted id
	* on error, it will exit from application
	*
	* @param string $sql, an sql insert query
	* @return int, the inserted id
	*/
	function addData($sql)
	{	
		// issue query
		$result = $this->link->query($sql);
		
		// check query results
		if($result === false)
		{
			exit($this->link->error);
		}
		
		// return the inserted id
		return $this->link->insert_id;
	}
	
	/*
	* Function to disable auto commits
	* similar to start transaction
	*
	* @param boolean $val, true to turn on and false to turn off
	* @return void
	*/
	function setAutoCommit($val)
	{
		mysqli_autocommit($this->link, $val);
	}
	
	/*
	* Function to manually commit query(ies)
	* must set auto commits off first
	*
	* @return void
	*/
	function commit()
	{
		mysqli_commit($this->link);
	}
	
	/*
	* Function to manually rollback query(ies)
	* must set auto commits off first
	*
	* @return void
	*/
	function rollback()
	{
		mysqli_rollback($this->link);
	}
	
}

?>