<?php
/*** error reporting on ***/
error_reporting(E_ALL && ~E_NOTICE);

/*** define the site path ***/
$site_path = str_replace('public_html', '', realpath(dirname(__FILE__)));
define ('__SITE_PATH', $site_path);
define ('__VALID_ENTRY', true);

include_once 'init.php';

/*** a new registry object ***/
$registry = new Registry();

if(file_exists(__SITE_PATH . '/app/conf/application.ini')){
	$registry->app = parse_ini_file(__SITE_PATH . '/app/conf/application.ini', true);
}
else{
	throw new Exception('Application configuration file is missing. Please be kind to contact with site administrator.');
}

$log = Log::getInstance('app');
$registry->env = (isset($_SERVER['APPLICATION_ENV']) && $_SERVER['APPLICATION_ENV'] == 'development') ? 'development' : 'production';	
$database_mode = 'database_' . $registry->env;

/*** active records initialization ***/
$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory(__SITE_PATH . '/app/models');
/** Database connection is disabled, uncomment to enable **/
//$cfg->set_connections(array($registry->env => $registry->confGet($database_mode, 'connectionString'))); 

/*** load the router ***/
$registry->router = new Router($registry);

/*** set the controller path ***/
$registry->router->setPath (__SITE_PATH . '/app/controllers');

/*** load up the template ***/
$registry->template = new Template($registry);

/*** load the controller ***/
$registry->router->loader();
?>
