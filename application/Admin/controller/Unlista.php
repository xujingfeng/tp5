<?php
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Validate;
use think\Db;
use app\Admin\model\Upp;
class Unlista extends Auth
{
//默认
	public function lista()
	{
		$data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>1])->order('autid','desc')->paginate(4);
              $page=$data->render();
              return view('lista',['arr'=>$data,'page'=>$page]);
	}
  //价格
  public function price()
  {
     $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>1])->order('autid','desc')->paginate(4);
              $page=$data->render();
              return view('lista',['arr'=>$price,'page'=>$page]);

  }
	public function del()
	{
		//return view('lista');
		$autid=$_GET['autid'];
		$bool=$user=new Upp;
        $bool=$user->save(['status'=>0],
        	              ['autid'=>$autid]);
        if($bool)
        {  
          echo "<script>alert('删除成功');</script>";
          $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>1])->order('autid','desc')->paginate(4);
              $page=$data->render();
              return view('lista',['arr'=>$data,'page'=>$page]);
        }else{
        	echo"<script>alert('删除失败');</script>";
              $data=Db::table('aut_goods')->alias('a')->join('aut_class w','a.classid=w.id')->where(['status'=>1])->order('autid','descs')->paginate(4);
              $page=$data->render();
              return view('lista',['arr'=>$data,'page'=>$page]);
        }

  	}

   public function chaxun(Request $request)
   {
    if($request->isPost())
    {
       $data=$request->param();
    }
   }



}