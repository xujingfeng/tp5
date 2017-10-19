<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
use app\Admin\model\Upp;
use think\Db;
class Undelet extends Auth
{
	public function delet()
	{
		//return view();
		$data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>0])->order('autid','desc')->select();
            return view('delet',['arr'=>$data]);
	 }

	 public function huanyuan()
	 {
	 	$autid=$_GET['autid'];
	 	$bool=$user=new Upp;
	 	     $bool=$user->save(['status'=>1],
	 	     	               ['autid'=>$autid]);
	 	     if($bool)
	 	     {
	 	       echo "<script>alert('还原成功');</script>";
               $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>0])->order('autid','desc')->select();
                //var_dump($data);
                if(!empty($datd))
                {
                  return view('delet',['arr'=>$data]);
                }else{
                	return view('delet',['arr'=>$data]);
                }
	 	     }else{
	 	     	 echo "<script>alert('还原失败');</script>";
                 $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>0])->order('autid','desc')->select();
                 if(!empty($data))
                 {
                   return view('delet',['arr'=>$data]);
                 }else{
                   return view('delet',['arr'=>$data]);
                 }
	 	     }
	 }
	 public function qingchu()
	 {
	 	echo $autid=$_GET['autid'];
	 	$bool=Upp::where('autid','=',$autid)->delete();
	 	if($bool)
	 	{
	 	  echo "<script>alert('清除成功');</script>";
         $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>0])->order('autid','desc')->select();
                return view('delet',['arr'=>$data]);
	 	}
	 	else{
	 		echo "<script>alert('清除失败,请稍后试');</script>";
	 		$data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>0])->order('autid','desc')->select();
                return view('delet',['arr'=>$data]);

	 	}

	 }
	
}