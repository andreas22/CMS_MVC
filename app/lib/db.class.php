<?php
if(!defined('__VALID_ENTRY') || !__VALID_ENTRY) die('This is not a valid entry point!');
/********************************************************************************
 * The MIT License (MIT)														*			
 * 																				*
 * Copyright (c) <year> <copyright holders>										*
 * 																				*
 * Permission is hereby granted, free of charge, to any person obtaining 		* 
 * a copy of this software and associated documentation files 					* 	
 * (the "Software"), to deal in the Software without restriction, including 	*
 * without limitation the rights to use, copy, modify, merge, publish, 			*
 * distribute, sublicense, and/or sell copies of the Software, and to permit 	*
 * persons to whom the Software is furnished to do so, subject to the 			*
 * following conditions:														*
 *																				*
 * The above copyright notice and this permission notice shall be included in  	*
 * all copies or substantial portions of the Software.							*
 * 																				*			
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 		*
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 	*
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 		*
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 	*
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 		*
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS * 
 * IN THE SOFTWARE.																*
 ********************************************************************************/

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
