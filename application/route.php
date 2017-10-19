<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\route;
//路由的选择(应用)
Route::get('aa','smort/Index/functionset');
Route::get('asp','home/Index/undelet');
Route::get('nbs','index/Index/functionset');
Route::get('two','smort/Index/compt');
Route::get('one','smort/Index/set');
route::get('three/:id','smort/Index/love');//必选
route::get('six/:gp','smort/Index/mand');
route::get('four/[:ss]','smort/Index/four');//可选路由 
route::get('five/[:aba]','smort/Index/java');
route::get('happ','smort/Index/ction');
route::get('ass','smort/Demo/function1');
route::post('ass1','smort/Demo/function2');
route::get('ass2','smort/Demo/function4');
route::get('ass3','smort/Demo2/fun1');
route::get('acc','smort/Demo2/fun2');
route::post('ccc/[:id]','smort/Demo2/ccc');
route::get('ddd','home/Demo/funt1');
route::get('eee','smort/Demo2/eee');
//route::get('fff','smort/Demo2/fff');
route::get('ggg','smort/Demo2/ggg');
route::get('hhh','smort/Demo2/hhh');
route::get('iii','smort/Demo2/iii');
route::get('jjj','smort/Demo2/jjj');
route::get('kkk','smort/Demo2/kkk');
route::get('lll','smort/Demo2/lll');
route::post('mmm','smort/Demo2/mmm');
route::get('nnn','smort/Demo2/nnn');
route::get('ooo','smort/Demo2/ooo');
route::get('ppp','smort/Demo2/ppp');
route::get('qqq','smort/Demo2/qqq');
route::get('www','smort/Demo2/www');
//Admin(后台项目)
route::any('login','Admin/Index/login');
route::any('index','Admin/Index/index');
//文章
route::get('llll','Admin/Article/llll');
//分类
route::any('addclass','Admin/Addclass/closs');
//添加
route::any('addgoods','Admin/Addgoods/goods');
//列表
route::get('unlista','Admin/Unlista/lista');
//修改
route::any('update','Admin/Update/onupdate');
//回收站
route::get('undelet','Admin/Undelet/delet');
//还原
Route::any('huanyuan','Admin/Undelet/huanyuan');
//清除
Route::any('qingchu','Admin/Undelet/qingchu');
//删除
route::get('delete','Admin/Unlista/del');
/*//查询
Route::any('chaxun','Admin/Unlista/chaxun');*/
//会员
route::get('user','Admin/User/vip');
//订单
route::get('order','Admin/Order/oms');
//权限
route::get('auth','Admin/Auth/limits');
route::get('listAuth','Admin/System/listAuth');
route::get('addRole','Admin/System/addRole');

return [
    '__pattern__' =>[
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
