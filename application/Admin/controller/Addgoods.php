<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
use think\Model;
use app\Admin\model\User;
class Addgoods  extends Auth
{
	public function goods(Request $request)
	{   
		if($request->isPost())
		{
           $data=$request->param();
           var_dump($data);
           //die();
           $file=request()->file('pic');
            if($file)
            {
              $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
               if($info){
                     $pic=$info->getSaveName();
               }else{
                     echo $file->getError();
               }

            }
            $user=new User;
            $list=['classid'=>$data['classId'],'artname'=>$data['artname'],'pic'=>$pic,'author'=>$data['author'],'price'=>$data['price'],'detail'=>$data['content'],'publisher'=>$data['publisher']];
            $bool=$user->ppp($list);
            if($bool){
                echo "<script>alert('添加成功');window.location.assign('addgoods')</script>";
            }else{
                echo "<script>alert('添加失败');window.location.assign('addgoods')</script>";
            }
        }
          
		$dat=model('User');
		$arr=$dat->select();
		return view('goods',['arr'=>$this->tree($arr)]);
	   }
	   //return view();
		

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