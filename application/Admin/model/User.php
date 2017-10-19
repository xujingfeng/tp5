<?php
namespace app\Admin\model;
use think\Model;
use think\Db;
class User extends Model
{
   protected $table='aut_class';
   public function yyy($data='')
   {
   	$bool=Db::table('aut_class')->insert($data);
   	if($bool){	
       return true;
   	}else{
   		return false;
   	}

   }
   public function ppp($data='')
   {
      $bool=Db::table('aut_goods')->insert($data);
      if($bool){  
       return true;
      }else{
         return false;
      }
   }

}