<?php 
namespace app\Admin\model;
use think\Model;
use think\Db;
class Upp extends Model
{
	protected $table = 'aut_goods';
    public function yyy($data='')
	{
         $bool=Db::table('aut_goods')->insert($data);
         if($bool){
         	return true;
         }else{
         	return false;
         }

	}

}