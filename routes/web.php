<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('foo',function(){
	return 'foo';
});

Route::any('index','IndexController@index');
Route::any('api','apiTestController@kk');
Route::get('kk', function () {
   "App\Http\Controllers\Kkk\kk";
});

Route::any('kep',function (){
	echo "kp";
})->name('Kkk_kk');

Route::any('Student','StudentController@index');


// //学习类的路由组
Route::prefix('study')->group(function(){

	//红包首页路由
	Route::any('bonus/index','Study\BonusController@index');
	//红包添加路由
	Route::any('bonus/add','Study\BonusController@addBonus');
	//红包列表
	Route::any('bonus/list','Study\BonusController@getList');
	//获取红包的列表
	Route::any('get/bonus','Study\BonusController@getBonus');
	//人气王列表
	Route::any('bonus/flag','Study\BonusController@getMaxBonus');
});




//登录页面
Route::any('admin/login','Admin\LoginController@index');
//执行登录
Route::any('admin/doLogin','Admin\LoginController@doLogin');
//用户退出
Route::any('admin/logout','Admin\LoginController@logout');


//管理后台RBAC功能的路由组
Route::middleware('admin_auth')->prefix('admin')->group(function(){

	//管理后台首页
	Route::any('home','Admin\HomeController@home')->name('admin.home');

	/*--------------------------------------[权限相关]-------------------------------------*/

	//权限列表
	Route::get('/permission/list','Admin\PermissionController@list')->name('admin.permission.list');

	//获取权限的数据
	Route::any('/get/permission/list/{fid}','Admin\PermissionController@getPermissionList')->name('admin.get.permission.list');

	//权限添加
	Route::get('/permission/create','Admin\PermissionController@create')->name('admin.permission.create');

	//执行权限添加
	Route::any('permissions/doCreate','Admin\PermissionController@doCreate')->name('admin.permission.doCreate');
	//删除权限操作
	Route::any('/permissions/del/{id}','Admin\PermissionController@del')->name('admin.permission.del');

	/*--------------------------------------[权限相关]-------------------------------------*/



	/*--------------------------------------[用户相关]-------------------------------------*/

	//用户添加页面
	Route::get('/user/add','Admin\AdminUsersController@create')->name('admin.user.add');

	//执行用户添加
	Route::any('/user/store','Admin\AdminUsersController@store')->name('admin.user.store');

	//用户列表页面
	Route::any('/user/list','Admin\AdminUsersController@list')->name('admin.user.list');

	//用户删除操作
	Route::any('/user/del/{id}','Admin\AdminUsersController@delUser')->name('admin.user.del');

	//用户修改页面
	Route::any('/user/edit/{id}','Admin\AdminUsersController@edit')->name('admin.user.edit');

	//执行用户修改
	Route::any('/user/doEdit','Admin\AdminUsersController@doEdit')->name('admin.user.doEdit');


	/*--------------------------------------[用户相关]-------------------------------------*/



	/*--------------------------------------[角色相关]-------------------------------------*/

	//角色列表
	Route::any('/role/list','Admin\RoleController@list')->name('admin.role.list');

	//角色删除
	Route::any('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');

	//角色添加
	Route::any('/role/create','Admin\RoleController@create')->name('admin.role.create');

	//角色执行添加
	Route::any('/role/store','Admin\RoleController@store')->name('admin.role.store');

	//角色修改
	Route::any('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');

	//角色执行修改
	Route::any('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');

	//角色权限修改
	Route::any('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');

	//角色权限执行修改
	Route::any('/role/permission/save','Admin\RoleController@savePermission')->name('admin.role.permission.save');
	




	/*--------------------------------------[角色相关]-------------------------------------*/

});