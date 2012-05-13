<?php
/*** error reporting on ***/
error_reporting(E_ALL);

/*** define the site path ***/
$site_path = str_replace('public_html', '', realpath(dirname(__FILE__)));
define ('__SITE_PATH', $site_path);
define ('__VALID_ENTRY', true);

include_once 'init.php';

$log = Log::getInstance('app');
$registry->env = (isset($_SERVER['APPLICATION_ENV']) && $_SERVER['APPLICATION_ENV'] == 'development') ? 'dev' : 'pro';

/*** create the database registry object ***/
/*
$registry->db = db::getInstance(
								$registry->confGet('database_' . $registry->env, 'hostname'),
								$registry->confGet('database_' . $registry->env, 'database'),
								$registry->confGet('database_' . $registry->env, 'username'),
								$registry->confGet('database_' . $registry->env, 'password')							
							);
*/							

/*** load the router ***/
$registry->router = new Router($registry);

/*** set the controller path ***/
$registry->router->setPath (__SITE_PATH . '/app/controllers');

/*** load up the template ***/
$registry->template = new Template($registry);

/*** load the controller ***/
$registry->router->loader();
?>
