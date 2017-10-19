<?php
namespace app\smort\controller;
use think\Controller;
class Demo extends Controller
{
	public function function1()
	{
       echo'吴雷';
         $this->assign('xjf','XJF');
          $this->assign('arr1',['dfsd','fdsf','sdaf']);
         $this->assign('arr',['name'=>'许金凤','age'=>21,'sex'=>'女']);

       return $this->fetch('demo1');  //demo1为文件夹demo1.html
       //return view('demo1');     //如果使用view助手函数，则不需要要继承（extends Controller）

	}
	public function function2()
	{
		var_dump($_POST);
	}
	public function function3()
	{
		baby();
	}
	public function function4()
	{
		echo '小baby';
	}

}