<?php
namespace micro\controller;
use micro\system\Base_controller as Base ;

class Test extends Base 
{
	public function __construct()
	{
		parent::__construct();
		echo 'hello world';
	}
}