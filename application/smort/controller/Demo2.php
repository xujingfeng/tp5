<?php
namespace app\smort\controller;
use think\View;
use think\Db;
use think\Request;
use think\Controller;
use think\Session;
use think\Cookie;
use think\Validate;
use app\smort\model\User;
class Demo2 extends Controller
{
	public function fun1()
	{
		echo "哈哈哈哈哈哈";
		 
          
           return view('ass3',['www'=>123,'kkk'=>456,'ooo'=>['name'=>'吴雷瓜皮','age'=>38,'sex'=>'男']]);
	}
	public function fun2()
	{  $arr=Db::table('user')->select();
        $view=new View();
       return $view->fetch('acc',['name'=>'张三','sex'=>'男','data'=>$arr]);
	}
	public function ccc(Request $request,$id='')
	{
		$data=$request->param();
		var_dump($data);
	}
	public function eee()
	{
        $arr=['name'=>'许金凤','sex'=>'女','age'=>'21'];
        //echo json_encode($arr);
        //$this->redirect('Demo2/fff');  //使用时必须继承extends Controller
        //$this->success('成功显示','Demo2/fff');
        //$this->error('显示失败,退回上一个页面');
        //return redirect('http://www.baidu.com');
        //header('location:ddd');
        //return redirect('jjj');
	}
 //验证码
	public function fff()
	{
		echo "<script>alert('验证成功！');</script>";
		echo "欢迎进入此页面";
	}
	public function _empty()
	{
		echo '方法不存在';
	}

	public function ggg()
	{
		if(isset($_GET['a']))
		{
			echo "<script>alert('验证码错误！');</script>";
			
		}
		return view();
	}
	   
	public function hhh(Request $request)
	{
		$data=$request->param();
		if(!captcha_check($data['yanzheng'])){
			 echo "<script>alert('验证码错误');window.history.go(-1);</script>";
			 //header('location:ggg?a=error');
		}else{

            //$this->redirect('fff');
            $validate=new Validate([
                 'name'=>'require|max:10',
                 'age'=>'require|number|between:1,120|integer',
            	],['name.max'=>'输入错误','name.require'=>'不能为空','age.between'=>'年龄必须在1-120岁之间']);
                if($validate->check($data))
                {
                   echo "成功进入";
                }else{
                   var_dump($validate->getError());//getError查找语法错误
                }
           
		}


	}
	//Session,Cookie的用法
	public function iii()
	{
		Session::set('name1','thinkphp1');
		Cookie::set('name2','thinkphp2',3600);
	}
	public function jjj()
	{
		echo Session::get('name1');	
		echo Cookie::get('name2');
	}
	//分页显示
	public function kkk()
	{
		$res=Db::table('user')->paginate(2);
		$page=$res->render();
		return view('kkk',['res'=>$res,'page'=>$page]);
	}

	//文件的上传
	public function lll()
	{
		return view();
	}
	public function mmm()
	{
		$file=request()->file('image');
		//dump($file);
		if($file)
		{
           $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                if($info)
                {
                      echo $info->getExtension();
                      echo $info->getSaveName();
                      echo $info->getFilename();
                }else{
                       echo $file->getError();
                }
		}
	}
	public function nnn()
	{
		$mm=model('User');//使用的是助手函数控制器和模型链接 返回对象
		$arr=$mm->select();

		foreach ($arr as $key=>$value)
		{
            echo $value->unname;
		}
		echo "<hr/>";

		$ss=new User();
		$sss=$ss->select();
		foreach($sss as $key=>$value)
		{
           echo $value->unname;
		}
	}

	//数据的添加
	public function ooo()
	{
		 /*控制器调用模型做数据的处理*/
		 $user=new User();
		 $data=['unname'=>'hhhh','sex'=>'男'];
		 $data=['unname'=>'hh吴雷','sex'=>'女','tel'=>1235656];
         $data=['unname'=>'吴雷是鸭子','sex'=>'女','tel'=>1235656];
		 var_dump($user->yyy($data));
	}
	//数据的删除
	public function ppp()
	{
		/*$user=User::get(17);  //删除单条记录
		$user->delete();*/
		User::destroy('15,16,20,');   //批量删除

	}
	//数据的查询
	public function qqq()
	{
		/*$user=User::get(14);   //根据编号查询
		echo $user->unname;*/

/*
		$user=User::all([1,2,3]);   //根据Id查询多条数据
	     foreach ($user as $key => $value) {
	     	 echo $value->unname;
	     }*/

	     /*$user=User::all(['unname'=>'瓜皮']); //根据姓名查询相同名字的值
	      foreach($user as $key=>$value)
	      {
	      	 echo"<br>";
             echo $value->unname;
	      }
		*/
	      $user=User::get(function($query){
               $query->where('unname','鸭子');
	      });
	      echo $user->unname;
	}
	//数据的更新(修改)
	public function www()
	{
        /*$user=User::get(14);    //根据Id修改某条数据
        $user->unname='雷雷的凤凤';
        $user->sex='女';
        $user->save();*/


        $USER=new User;   //修改多条数据
        $user=[
                  ['uid'=>1,'unname'=>'金凤哈哈哈','sex'=>'男'],
                  ['uid'=>10,'unname'=>'瓜皮哈哈哈','sex'=>'女'],
                  ['uid'=>13,'unname'=>'吴雷哈哈哈','sex'=>'女']
        ];
        $USER->saveAll($user);
	}

	
}