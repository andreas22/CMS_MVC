<?php
if(!defined('__VALID_ENTRY') || !__VALID_ENTRY) die('This is not a valid entry point!');
 /*** include the registry class ***/
 include __SITE_PATH . '/app/lib/' . 'registry.class.php';
 
 /*** a new registry object ***/
 $registry = new Registry();

if(file_exists(__SITE_PATH . '/app/conf/application.ini')){
	$registry->app = parse_ini_file(__SITE_PATH . '/app/conf/application.ini', true);
}
else{
	throw new Exception('Application configuration file is missing. Please be kind to contact with site administrator.');
}

/**** Third party libraries ***/
include __SITE_PATH . '/app/lib/' . 'Smarty-3.1.8/Smarty.class.php'; 
include __SITE_PATH . '/app/lib/' . 'PhpMailer/class.phpmailer.php';

/**** CMS libraries ***/
include __SITE_PATH . '/app/lib/' . 'log.class.php';
include __SITE_PATH . '/app/lib/' . 'controller_base.class.php';
include __SITE_PATH . '/app/lib/' . 'router.class.php';
include __SITE_PATH . '/app/lib/' . 'template.class.php';
include __SITE_PATH . '/app/lib/' . 'db.class.php';

/*** auto load model classes ***/
function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . 'app/lib/models/' . $filename;

    if (file_exists($file) == false){
        return false;
    }
  
	include_once ($file);
}
?>
