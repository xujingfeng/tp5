<?php
namespace app\smort\controller;
use think\Request;
use think\Db;
class Index
{
   /* public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }*/

    public function functionset()
    {
    	echo "许金凤";
    }

    public function compt()
    {
    	echo "小鸭子我们一起去看海";
    }

     public function set()
    {
    	echo "jhuiyiu";
    }
    public function love($id='')
    {
      echo $id;
    }
    public function four($ss='')
    {
       echo $ss;
    }
    public function java($aba='')
    {
       echo $aba;
       echo "傻逼";
    }
    public function mand($gp='')
    {
    	echo $gp;
    	echo '吴雷是瓜皮';
    }
    public function ction()
    {
        echo "开心学习每一天";
    }
    public function publ(Request $request)
    {
        $obj=$request->param();
        var_dump($obj);
    }
    public function open()
    {
        $add=request::instance();
        $odb=$add->param();
        var_dump($odb);
    }
    public function delete()
    {
        $asp=input('param.');
        var_dump($asp);
    }
    public function delete1(request $request)
    {
        $ass=$request->param();
        var_dump($ass);
    }
    public function delete2()
    {
        $ftp=request::instance();
        $add=$ftp->param();
        var_dump($add);
    }
    public function delete3()
    {
        $add=input('param.');
        var_dump($add);
    }
    public function hello(Request $request,$name='World',$age='男',$name1='吴雷是瓜皮')
    {
       echo 'domain:'.$request->domain().'<br>';   //获取当前域名
       
       echo '当前域名:'.$request->domain().'<br>';
       echo 'hello'.$name.'<br>';   
       echo $age.'<br>';
       echo '当前入口文件:'.$request->baseFile().'<br>';   //获取当前入口文件68
       echo 'url地址:'.$request->url().'<br>';     //url地址（包含域名）
       echo $name1.'<br>';
       echo '获取地址不含域名'.$request->url(true).'<br>';   //获取地址不含域名
       echo 'root:'.$request->baseUrl().'<br>';
       echo 'root:'.$request->root().'<br>';
       echo 'pathinfo:'.$request->pathinfo().'<br>';   //获取地址含后缀
       echo '获取地址不含后缀:'.$request->path().'<br>';  //获取地址不含后缀
       echo 'ext:'.$request->ext().'<br>';   //获取地址中的后缀信息
    }

    public function quest()
    {
        //$add=Db::query('select * from user');   //查询
    +0   //$add=Db::execute("insert into user value(5,'一起看海','女',467899)");//增加
        //$bool=Db::execute("update user set unname='哈哈' where uid=1");//修改
        //$ass=Db::execute("delete from user where uid=4"); //删除
        //$arr=Db::table('tg_style')->where(['class_id'=>3])->select();//查询多条语句
        //$arr=Db::name('style')->where(['id'=>1])->find();   //查询一条语句
        //$arr=Db::name('goods')->where('price','>',299)->select();
        //$arr=Db::table('tg_class')->where(['pid'=>0])->select();//查询数据表tg_class中pid=0的数据。
        //$dele=Db::table('tg_class')->delete([7,8]);//数据的删除
        //$data=['unname'=>'瓜皮','sex'=>'男','tel'=>'17791388519'];
        //$pad=['unname'=>'吴雷','sex'=>'男','tel'=>'17602912053'];
        //$add=Db::table('user')->insert( $pad);//数据的添加
        //$add=Db::table('user')->where(['sex'=>'瓜'])->update($pad);//数据的修改
        //dump($add);
        
    }
    public function delecta()
    {
        $add=Db::table('user')->where('uid','>',1)->where('sex','女')->select();
         dump($add);
    }
}
