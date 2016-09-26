<?php
ini_set('display_error',1);

/**
 * define framework path const var
 */
define("ROOTPATH", __DIR__);
define("SYSPATH", ROOTPATH.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR);
define("CPATH",ROOTPATH.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR);
define("MPATH",ROOTPATH.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR);
define("VPATH",ROOTPATH.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR);

// var_dump(ROOTPATH,SYSPATH,CPATH,MPATH,VPATH);
// require SYSPATH.'core.php';
require SYSPATH.'Auto_load.php';
$autoload = new \micro\system\Auto_load();
$autoload->register();

//$sd = new \micro\controller\Test\sss\aaa();
$sd = new \micro\controller\Test();
//var_dump($sd);

