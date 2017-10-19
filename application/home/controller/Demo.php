<?php
namespace app\home\controller;
use think\View;
class Demo
{
	public function funt1()
	{
		
		$view=new View();

		return $view->fetch('ddd');
		}
}