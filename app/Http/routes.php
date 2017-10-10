<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Controllers\UserController;

/*
 * 路由转发
 * 转发url   sitename.com/
 * 转发控制器 ArticleController
 * 功能 显示Work的增加、删除、修改、查询
 */
Route::get('/','ArticleController@index');
Route::resource('/article','ArticleController');
Route::get('/home','ArticleController@index');


/*
 * 路由转发
 * 转发url   sitename.com/work
 * 转发控制器 WorkController
 * 功能 显示Work的增加、删除、修改、查询
 */
Route::resource('/work','WorkController');
Route::get('/work/apply/{id}','WorkController@apply')
        ->where('id','[0-9]+');

/*
 * 路由转发
 * 转发url   sitename.com/work
 * 转发控制器 Auth\AuthController
 * 功能 实现用户的登陆、注册、退出等功能
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('user', 'UserController@info');
Route::get('user/avatar', 'UserController@avatar');
Route::post('user/avatar', 'UserController@avatarUpload');
Route::resource('users', 'UserController');

/*
 * 路由转发
 * 转发url   sitename.com/background
 * 转发控制器 Background
 * 功能 实现后台管理
 */
Route::get('/background', 'BlackController@index');
Route::get('/background/article', 'BlackController@article');
Route::get('/background/user', 'BlackController@user');
Route::resource('/background/users', 'UserController');
Route::get('/background/admin', 'BlackController@admin');
Route::get('/background/work', 'BlackController@work');

