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

include __SITE_PATH . '/app/lib/' . 'Log4php/Logger.php';

class Log{
	
	private static $instance = NULL;
	
	private $log;
	
	public static function getInstance($name = null) {	
		if (!self::$instance){	 
			if(!file_exists(__SITE_PATH . '/app/logs')) throw new Exception('Directory logs do not exitsts, to continue please the directory at ' . __SITE_PATH . 'app/logs');
			Logger::configure( __SITE_PATH . '/app/conf/log.properties' );			  		    
		    self::$instance = Logger::getLogger($name);		     
	    }	    
		return self::$instance;
	}
	
	
	public function __construct($loggerName = null){
	}
	
	public function warn($message, $caller = null){
		$this->log->warn($message, $caller);
	}
	
	public function info($message, $caller = null){
		$this->log->info($message, $caller);
	}
	
	public function error($message, $caller = null){
		$this->log->error($message, $caller);
	}
	
	public function fatal($message, $caller = null){
		$this->log->fatal($message, $caller);
	}
	
	public function debug($message, $caller = null){
		$this->log->debug($message, $caller);
	}	
}
?>