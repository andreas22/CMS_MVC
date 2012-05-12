<?php
class db{
	
	/*** Declare instance ***/
	private static $instance = NULL;
	
	/**
	*
	* the constructor is set to private so
	* so nobody can create a new instance using new
	*
	*/
	private function __construct() {
	  /*** maybe set the db name here later ***/
	}
	
	/**
	*
	* Return DB instance or create intitial connection
	*
	* @return object (PDO)
	*
	* @access public
	*
	*/
	public static function getInstance($hostname = null, $database = null, $username = null, $password = null) {
	
		if (!self::$instance && !empty($hostname) && !empty($database) && !empty($username))
	    {	    		    	
		    self::$instance = new PDO(sprintf("mysql:host=%s;dbname=%s", $hostname, $database), $username, $password);
		    self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	    	
	    }
	    
		return self::$instance;
	}
	
	/**
	*
	* Like the constructor, we make __clone private
	* so nobody can clone the instance
	*
	*/
	private function __clone(){
		//Not to be implemented
	}

} /*** end of class ***/

?>
