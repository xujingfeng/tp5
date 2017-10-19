<?php
namespace app\Admin\controller;
use think\Request;
use think\Validate;
use app\Admin\controller\Auth;
use think\Db;
class System   extends Auth
{
	public function listAuth()
	{
		return view();
	}
	public function addRole()
	{
		//return view();
		$arr=Db::('RBAC_node')->select();
		var_dump($arr);
	}
}