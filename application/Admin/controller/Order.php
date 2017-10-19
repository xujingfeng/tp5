<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
class Order extends Auth
{
	public function oms()
	{
		return view();
	}
}
