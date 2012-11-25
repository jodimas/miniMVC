<?php


/**
 * Der webroot ( SITE_ROOT ) muss auf  den Folder in dem diese Datei liegr zeigen
 */

define('DB_PASSWORD', '');
define('DB_USER', '');
define('DB_NAME', '');
define('DB_HOST', '');

define('WEBSITE_URL' , 'http://www.mysite.com');


define('SERVER_ROOT' , '/var/www/mvc');
/**
 * Fetch the router
 */

require_once('controllers/' . 'router.php');


?>