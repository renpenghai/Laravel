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
//路由中输出试图
Route::get('/', function () {
    return view('welcome');
});

Route::get('view', function () {
    return view('welcome');
});
//get路由
Route::get('rphget',function(){
	return 'Hellow Word rphget';
});

//post路由
Route::post('rphpost',function(){
	return 'Hellow Word rphpost';
});

//match多请求路由
Route::match(['get','post'],'rphmatch',function(){
	return 'Hellow Word rphmatch';
});
//any多请求路由
Route::any('rphany',function(){
	return 'Hellow Word rphany';
});

//路由单参数
Route::get('r/{id?}',function($id=0){
	return 'r'.$id;
})->where('id','[0-9]+');

//路由多参数
Route::get('p/{id?}/{name?}',function($id=0,$name='p'){
	return 'id-'.$id.',name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//路由别名,在本路由进行调用，不需要需改多处，只需要修改user即可
Route::get('user',['as'=>'use',function(){
	return route('use');
}]);

//路由群组
Route::group(['prefix'=>'member'],function(){
	Route::get('user',['as'=>'use',function(){
	return route('use');
    }]);

    //get路由
    Route::get('rphget',function(){
	return 'member-rphget';
    });
});



//路由调用控制器
//第一种
Route::get('UName','UserController@Name');
//第二种
Route::get('UName',['uses'=>'UserController@Name']);
//第三种 调用路由并且起别名
Route::get('UTwoName',[
	'uses'=>'UserController@TwoName',
	'as'=>'OtherName']);
Route::get('CUName/{name?}','UserController@Name')->where('name','[A-Za-z]++');


Route::get('info','memberController@info');

Route::get('GoDBUser','UserController@GoDBUser');

Route::get('GoDBUser1','UserController@GoDBUser1');

Route::get('GoDBUser2','UserController@GoDBUser2');

Route::get('GoDBUser3','UserController@GoDBUser3');

Route::get('GoDBUser4','UserController@GoDBUser4');

Route::get('GoDBUser5','UserController@GoDBUser5');

Route::get('ORM1','UserController@ORM1');

