<?php

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
