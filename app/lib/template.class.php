<?php
if(!defined('__VALID_ENTRY') || !__VALID_ENTRY) die('This is not a valid entry point!');
/********************************************************************************
 * The MIT License (MIT)														*			
 * 																				*
 * Copyright (c) <2012> <Andreas Christodoulou>									*
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

Class Template {
	
	/*
	 * @the registry
	 * @access private
	 */
	private $registry;
	
	/*
	 * @Variables array
	 * @access private
	 */
	private $vars = array();
	
	/**
	 *
	 * @constructor
	 *
	 * @access public
	 *
	 * @return void
	 *
	 */
	function __construct($registry) {
		$this->registry = $registry;	
		$this->init();		
	}
	
	private function init(){
		$smarty = $this->registry->smarty = new Smarty();
		$smarty->debugging = $this->registry->confGet('smarty', 'debugging');
		$smarty->caching = $this->registry->confGet('smarty', 'caching');
		$smarty->cache_lifetime = $this->registry->confGet('smarty', 'cache_lifetime');
		$smarty->template_dir = $this->registry->confGet('smarty', 'template_dir');		
		$smarty->compile_dir  = $this->registry->confGet('smarty', 'compile_dir');
		$smarty->plugins_dir  = $this->registry->confGet('smarty', 'plugins_dir');		
	}
		
	 /**
	 *
	 * @set undefined vars
	 *
	 * @param string $index
	 *
	 * @param mixed $value
	 *
	 * @return void
	 *
	 */
	 public function __set($index, $value)
	 {
	        $this->vars[$index] = $value;
	 }
		
	function show($name) {		
		// Load variables
		foreach ($this->vars as $key => $value)
		{
			$this->registry->smarty->assign("$key", $value);
		}
		
		$template = $name . '.tpl';
		if(file_exists($this->registry->smarty->template_dir[0] . $template)){
			$this->registry->smarty->display($template);	
		}	
		else{
			$this->registry->smarty->display('error404.tpl');	 
		}	
	}
}

?>
