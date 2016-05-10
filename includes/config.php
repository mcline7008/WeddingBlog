<?php
ob_start();
session_start();

//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'matthew');
define('DBPASS', 'yOwl6emu!7008');
define('DBNAME', 'wedding_blog');

$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//set the default timezone
date_default_timezone_set('Europe/London');

//Load classes as needed
function __autoload($class){
	$class = strtolower($class);

	// If the call is from within assets
	$classpath = 'classes/class.'.$class . '.php';
	if(file_exists($classpath)){
		require_once $classpath;
	}

	// If the call is from withing admin
	$classpath = '../classes/class.' . $class . '.php';
	if ( file_exists($classpath)){
		require_once $classpath;
	}

	// If the call is from within admin subfolder
	$classpath = '../../classes/class.' . $class . '.php';
	if ( file_exists($classpath)){
		require_once $classpath;
	}
}

$user = new User($db);

?>
