<?php
namespace app\Admin\controller;
use think\Request;
use think\Validate;
class Index
{
    public function index()
    {
        echo "欢迎进入";
    }
    public function login(Request $request)
    {
      if($request->isPost())
        {
          $data=$request->param();
          $validate=new Validate([
               'yonghu'=>'require|max:10',
               'pass'=>'require',
               'captcha|验证码'=>'require|captcha'
            ]);
          if(!$validate->batch()->check($data))
          {
               $error=$validate->getError();
               if(!isset($error['yonghu']))
               {
                  $error['yonghu']='';
               }
               if(!isset($error['pass']))
               {
                  $error['pass']='';
               }
               return json_encode($error);
          }else{
                 $obj=Model('Login');
                 $bool=$obj->onfunt($data);
               if($bool)
               {
                   return json_encode(['status'=>1]);
               }else{
                   return json_encode(['status'=>0]);
               }
           
          }
          return;
       
        }
      
      return view();
    }
    
}






