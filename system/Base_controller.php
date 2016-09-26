<?php
namespace micro\system;
use micro\model\Base_model as model;
use micro\system\Auto_load ;
class Base_controller 
{
    protected $loader ;
    protected  $_class =[];
	public function __construct()
	{
		echo 'Base_controller init'.PHP_EOL;
        $c = new model();
        var_dump($c);
        $model = $this->model();
        var_dump($model);
	}


	public function load()
    {
        $this->loader = new Auto_load();
        $this->loader->register();
    }

    public function model($name='Base_model')
    {
//        $this->load();
        $full_name = '\\micro\\model\\'.$name;
        var_dump($full_name);
        $model =  new $full_name() ;
        var_dump($model);
        return $model ;
    }

    public function view()
    {

    }


}