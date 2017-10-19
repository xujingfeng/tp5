<?php
namespace app\Admin\model;
use think\Model;
use think\Db; 
use think\Session;
class Login extends Model
{
	public function onfunt($arr='')
	{
       $yonghu=$arr['yonghu'];
       $pass=$arr['pass'];
       $array=Db::table('aut_rbac_user')->where(['username'=>$yonghu])->find();
       if($array)
       {
          if($array['pwd']==md5($pass)){
            Session::set('UserRoleId',$array['role_id']);
            Session::set('UserId',$array['id']);
            Session::set('UserName',$array['username']);
          	 return true;
          }else{
          	 return false;
          }
       }else{
             return false;
       } 
	}
}