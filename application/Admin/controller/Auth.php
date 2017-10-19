<?php
namespace app\Admin\controller;
use think\Request;
use think\Validate;
use think\Db;
use think\Session;
class Auth 
{
	public function limits()
	{
		return view();
	}
	/*public function selt()
	{
		//return view();
		$arr=Db::table('rbac_user')->select();
		$sql="select operation from rbac_node,aut_rbac_role where aut_rbac_role.id=2 and aut_rbac_role.node_id=rbac_node.id and rbac_node.operation='update'";
		return view('selt',['arr'=>$arr]);
	}*/
	public function yanzheng($order)
	{
		$userid=Session::get('UserRoleId');
		$role=Db::table('aut_rbac_role')->where(['id'=>$userid])->find();
		var_dump($role);
		$array=$role['node_id'];
        $newarr=explode(',',$array);
        //var_dump($newarr);
        $count=count($newarr);
           for($i=0; $i<$count;$i++)
           {    
           	    $node[]=Db::table('aut_rbac_node')->field('operation')->where(['id'=>$newarr[$i]])->select();
	           	if($node[$i][0]['operation']==$order)
	           	{
                   return 1;
	           	}
           }
	}
	

	public function __construct(Request $request)
	{
      $order=$request->path();
      echo Session::get('UserName');
      echo '角色id是'.Session::get('UserRoleId').'<br>';
      if(!Session::get('UserName'))
      {
        /*header('location:login');*/
        echo "<script>window.location.assign('login')</script>";
        return false;
      }
      $num=$this->yanzheng($order);
        if($num==1){
            echo '<script>alert("有权限");</script>';
        }else{
            echo '<script>alert("没有权限访问");</script>';
            //header('location:llll');
           
            die();
        }
	}




}
