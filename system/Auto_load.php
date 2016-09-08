<?php
namespace micro\system;

/**
 * Auto load namespace class file
 */
class Auto_load 
{
	/**
	 * namespace load array
	 * @var array
	 */
	protected $prefix = [
		'micro\controller' => CPATH
	];

	/**
	 * namespace queue list create
	 * @return void
	 */
	public function register()
	{
		spl_autoload_register(array($this,'load_Class'));
	}

	/**
	 * auto load namespace path 
	 * @param  [type] $class [description]
	 * @return [type]        [description]
	 */
	public function load_Class($class)
	{
		$prefix = $class ; 
		// $pos = strrpos($prefix,'\\');
		while (false !== $pos = strrpos($prefix, '\\')) {
			// retain the trailing namespace separator in the prefix
			// var_dump($pos);
            echo $prefix = substr($class, 0, $pos + 1);
            echo '<br />';
            // the rest is the relative class name
            echo $relative_class = substr($class, $pos + 1);
            $mapfile = $this->loadClassMap($prefix,$relative_class);
            if($mapfile)
            {
            	return $mapfile ;
            }
			echo '<br />';
			 $prefix = rtrim($prefix,'\\');
			// echo '<br />';
		}

	}

	protected function loadClassMap($namespace,$class)
	{
		
		
		$key = rtrim($namespace,'\\');
		var_dump($this->prefix[$key]);
		if(isset($this->prefix[$key]) === false)
		{
			return false ;
		}

		foreach ($this->prefix[$key] as $map_path) {
			echo $real_path = $map_path.str_replace('\\', '/', $class).'.php';
		}
	}

}