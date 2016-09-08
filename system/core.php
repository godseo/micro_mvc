<?php

/**
 * autoload namespace mvc-class path file
 */
spl_autoload_register(function($class){

	// class name map
	$prefix = [
	'controller' 	=> 'micro\\controller\\' ,
	'model' 		=> 'micro\\model\\',
	'view' 			=> 'micro\\view\\',
	'system' 		=> 'micro\\system\\'
	];

	//class file find path
	$path = [
	'controller' 	=> CPATH ,
	'model' 		=> MPATH ,
	'view' 			=> VPATH ,
	'system' 		=> SYSPATH 
	];

	//match real class and class path file
	$real_path = '';
	foreach ($prefix as $key => $value) {
		$len = strlen($prefix[$key]);
		if(strncmp($value, $class, $len) !== 0)
		{
			continue ;
		} 
		$real_path = $path[$key];
		if(!empty($real_path))
		{
			$real_class =substr($class, $len);
			break;
		} else {
			//if no match will move other autoload
			return ;
		}
	}
	$real_class_file = $real_path.str_replace('\\', '/', $real_class).'.php';

	//load file
	if(file_exists($real_class_file))
	{
		require $real_class_file;
		return true ;
	} else {
		return false ;
	}
	var_dump($real_path,$real_class,$real_class_file) ;

});

