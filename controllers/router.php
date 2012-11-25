<?php

function __autoload($className) {

	list($suffix, $filename) = preg_split('/_/', strrev($className), 2);
	$filename = strrev($filename);
	$suffix = strrev($suffix);

	switch (strtolower($suffix)) {
		case 'model' :
			$folder = '/models/';

			break;

		case 'library' :
			$folder = '/libraries/';

			break;

		case 'driver' :
			$folder = '/libraries/drivers/';

			break;
	}

	$file = SERVER_ROOT . $folder . strtolower($filename) . '.php';
   
	if (file_exists($file)) {
		//get file        
		include_once ($file);
    
	} else {

		die("File '$filename' containing class '$className' not found in '$folder'.");
	}
}
  
$request = $_SERVER['QUERY_STRING'];
$requestURI = ($_SERVER['REQUEST_URI']);

if(stripos($requestURI, '?callback=')){
	$pos = stripos($requestURI, '?callback=');
	$frag = explode('callback=', $requestURI);
	$newRequest  = 'index&callback='. $frag[1];
	$request = $newRequest;
} 
$removeCallback = explode('&callback=', $request);
   
$parsed = explode('&', $removeCallback[0]);

$page = array_shift($parsed);

if($page == '')	{
	$page = 'index';
}

$getVars = array();
foreach ($parsed as $argument) {
	list($variable, $value) = explode('=', $argument);
	$getVars[$variable] = urldecode($value);
}

$target = SERVER_ROOT . '/controllers/' . $page . '.php';

if (file_exists($target)) {
	include_once ($target);
	
	$class = ucfirst($page) . '_Controller';

	if (class_exists($class)) {
		$controller = new $class;
	} else {
		die('class does not exist!');
	}
} else {
	die('page does not exist!');
}

$controller -> main($getVars);
?>