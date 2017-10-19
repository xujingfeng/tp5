<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
use app\Admin\model\User;
class Addclass extends Auth
{
	public function closs(Request $request)
	{
		//
     if($request->isPOST()) 
     {
        $data=$_POST;
        /*$sqls="insert into aut_class(title,pid) value('{$data['names']}',{$data['ids']})";*/
        $user=new User();
		$data=['title'=>$data['names'],'pid'=>$data['ids']];
		$bool=$user->yyy($data);
       if($bool){
            return json_encode(['status'=>1]);
        }else{
            return json_encode(['status'=>0]);
        }
        
     }
        $mm=model('User');//使用的是助手函数控制器和模型链接 返回对象
		$arr=$mm->select();
		return view('closs',['arr'=>$this->tree($arr)]);	
	}
	 public function tree($array,$id=0,$pid=0)
	   {   
	       static $newArr=array();
	          foreach ($array as $key => $value) {
	                  if($value['pid']==$id){
	                       $value['num']=$pid;
	                       $newArr[]=$value;               
	                      $this->tree($array,$value['id'],$pid+1); 
	                      
	                  }
	             
	          }
	          return $newArr;
	   }
}