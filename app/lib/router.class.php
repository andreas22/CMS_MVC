<?php

class Router {
	 /*
	 * @the registry
	 */
	 private $registry;
	
	 /*
	 * @the controller path
	 */
	 private $path;	
	 private $args = array();	
	 public $file;	
	 public $controller;	
	 public $action; 
	
	 function __construct($registry) {
		$this->registry = $registry;
	 }
	
	 /**
	 *
	 * @set controller directory path
	 *
	 * @param string $path
	 *
	 * @return void
	 *
	 */
	 function setPath($path) {
	
		/*** check if path is a directory ***/
		if (is_dir($path) == false)
		{
			throw new Exception ('Invalid controller path: `' . $path . '`');
		}
		/*** set the path ***/
	 	$this->path = $path;
	}
	
	
	 /**
	 *
	 * @load the controller
	 *
	 * @access public
	 *
	 * @return void
	 *
	 */
	 public function loader()
	 {
		/*** check the route ***/
		$this->getController();
	
		/*** if the file is not there diaf ***/
		if (is_readable($this->file) == false)
		{
			$this->file = $this->path.'/error404Controller.php';
	                $this->controller = 'error404';
		}
	
		/*** include the controller ***/
		include $this->file;
	
		/*** a new controller class instance ***/
		$class = $this->controller . 'Controller';
		$controller = new $class($this->registry); 
	
		/*** check if the action is callable ***/
		if (is_callable(array($controller, $this->action)) == false)
		{
			$action = 'index';
		}
		else
		{
			$action = $this->action;								
		}
				
		/*** run the action ***/
		//$controller->$action();	//Update: pass url arguments to controller method	
		call_user_func_array(Array($controller, $this->action), $this->args);
	 }
	
	
	 /**
	 *
	 * @get the controller
	 *
	 * @access private
	 *
	 * @return void
	 *
	 */
	private function getController() {
	
		/*** get the route from the url ***/
		$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

		if (empty($route))
		{
			$route = 'index';
		}
		else
		{
			/*** get the parts of the route ***/
			$parts = explode('/', $route); 
			$this->controller = $parts[0];
			if(isset( $parts[1]))
			{
				$this->action = $parts[1];
				
				if(isset( $parts[2]))
				{
					unset($parts[0]); //ControllerName
					unset($parts[1]); //ControlerAction
					$this->args = $parts; 
				}
			}						
		}
	
		if (empty($this->controller))
		{
			$this->controller = 'index';
		}
	
		/*** Get action ***/
		if (empty($this->action))
		{
			$this->action = 'index';
		}
	
		/*** set the file path ***/
		$this->file = $this->path .'/'. $this->controller . 'Controller.php';
	}
}

?>
