<?php
namespace micro\controller;
use micro\system\Base_controller as Base ;
//use micro\model\Base_model as model ;
class Test extends Base 
{
	public function __construct()
	{
		parent::__construct();
		echo 'hello world'.PHP_EOL;
//        $model = $this->model('Base_model');
	}


}