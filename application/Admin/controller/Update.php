<?php 
namespace app\Admin\controller;
use app\Admin\controller\Auth;
use think\Request;
use think\Model;
use app\Admin\model\Inse;
use app\Admin\model\Upp;
use think\Db;
class Update extends Auth
{
    public function onupdate(Request $request)
    {
    	//return view();
    	echo $autid=$_GET['autid'];
    	if($request->isPost())
    	{
           $data=$request->param();
           //echo $data($id);

           //var_dump($data);
           //echo $_GET['id'];
           $file=$request->file('pic');
           //var_dump($file);
           if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                    if($info){
                         $pic=$info->getSaveName();

                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();
                        return;
                    }
                    $user=new Upp;
                    $bool=$user->save([
                    'autid'=>$data['autid'],
					'pic'=>$pic,
					'artname'=>$data['artname'],
					'publisher'=>$data['publisher'],
					'author'=>$data['author'],
					'price'=>$data['price'],
					'detail'=>$data['content']
		        	],['autid'=>$autid]);
		            //var_dump($bool);
		             if($bool)
				        {
				        	echo "<script>alert('修改成功');window.location.assign('update?autid={$_GET['autid']}');</script>";
				        }
				        else{
				        	echo "<script>alert('修改失败');window.location.assign('update?autid={$_GET['autid']}');</script>";
				        }
                }else{
                	 $user=new Upp;
					
			        $user=new Upp;
                    $bool=$user->save([
                    'classid'=>$data['classId'],
					'artname'=>$data['artname'],
					'publisher'=>$data['publisher'],
					'author'=>$data['author'],
					'price'=>$data['price'],
					'detail'=>$data['content']
		        	],['autid'=>$autid]);
			         //var_dump($bool);
			         if($bool)
				        {
				        	echo "<script>alert('修改成功');window.location.assign('update?autid={$_GET['autid']}');</script>";
				        }
				        else{
				        	echo "<script>alert('修改失败');window.location.assign('update?autid={$_GET['autid']}');</script>";
				        }
    	      }
    }
    $user=model('User');
		$arr1=$user->select();
		$data=Db::table('aut_goods')->where('autid',$_GET['autid'])->select();
		var_dump($data);
		return view('onupdate',['arr1'=>$this->tree($arr1),'arr2'=>$data]);
		
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