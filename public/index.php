<?php


use APP\Core\app;

define("DS",DIRECTORY_SEPARATOR);
define('ROOT_PATH',dirname(__DIR__));
define('APP',ROOT_PATH.DS."app".DS);
define("CORE",APP.'Core'.DS);
define("CONFIG",APP.'Config'.DS);
define("CONTROLLERS",APP.'Controllers'.DS);
define("MODELS",APP.'Models'.DS);
define("VIEWS",APP.'Views'.DS);
define("USERNAME",'root');
define('DATABASE','mvc22_db');
define('PASSWORD','');
define('HOST','localhost');
define('PORT','3306');
define('CHARSET','utf8');
define('DB_TYPE','mysql');

require_once (ROOT_PATH.DS."vendor".DS."autoload.php");

$app = new app();