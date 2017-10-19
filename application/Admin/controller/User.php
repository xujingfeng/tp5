<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
class User extends Auth
{
	public function vip()
	{
		return view();
	}
}
