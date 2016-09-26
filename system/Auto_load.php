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
        'micro\controller' => CPATH,
        'micro\model' => MPATH,
        'micro\view' => VPATH ,
        'micro\system' => SYSPATH
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
//            echo '<br />';
            // the rest is the relative class name
            echo $relative_class = substr($class, $pos + 1);
            $mapfile = $this->loadClassMap($prefix,$relative_class);
            var_dump($mapfile);
            if($mapfile)
            {
            	$this->get_file($mapfile) ;
                break;
            }
			echo '<br />';
			 $prefix = rtrim($prefix,'\\');
			// echo '<br />';
		}

	}

	protected function loadClassMap($namespace,$class)
	{
		
		//todo::the next step add class_map function
		$key = rtrim($namespace,'\\');
//		var_dump($namespace,$key,$this->prefix[$key]);
		if(isset($this->prefix[$key]))
		{
            if(is_array($this->prefix[$key])) //muti namespace binding
            {
                foreach ($this->prefix[$key] as $map_path) {
                     $real_path[] = $map_path.str_replace('\\', '/', $class).'.php';
                }
            } else {
                 $real_path = $this->prefix[$key].str_replace('\\', '/', $class).'.php';
            }
//            var_dump($real_path);
            return $real_path;
		} else {
            return false ;
        }

	}

    protected function get_file($file_name)
    {
        if(is_array($file_name))
        {
            foreach ($file_name as $key => $value)
            {
                if(file_exists($file_name))
                {
                    require_once "{$file_name}";
                }
            }
        } else {
            if(file_exists($file_name))
            {
                require_once "{$file_name}";
            }
        }

	}

}