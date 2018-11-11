<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use app;
use Illuminate\Database\Eloquent\Controllers;


class UserController extends Controller
{
	public function Name($name='rph')
	{
		//return '名称'.$name;
		return view('welcome1');
	}
    public function TwoName()
	{
		return route('OtherName');
	}
	public function GoDBUser()
	{
	   //添加1
	   //$bool=DB::insert('insert into user(name,age) values(?,?)',['张宇',18]);
	   //var_dump($bool);
	   //添加2
	   //$bool=DB::insert('insert into user(name,age) values(?,?)',['刘策',30]);
	   //var_dump($bool);
	   //更新
	   //$num= DB::update('update user set age=? where name=?',[20,'刘策']);
	   //var_dump($num);
	   //删除
	   //$count= DB::delete('delete from user where name=?',['刘策']);
	   //var_dump($count);
	   //查询
	   $arr= DB::select('select * from user');
	   var_dump($arr);
	}
	//使用查询构造器添加数据
	public function GoDBUser1()
	{
		//普通添加
		//$bool=DB::table('user')->insert(['name'=>'李志强','age'=>19]);
		//var_dump($bool);
		//添加并且返回添加的id
		//$id=DB::table('user')->insertGetId(['name'=>'柳州','age'=>23]);
		//var_dump($id);
		//一次插入多条数据
		$bool=DB::table('user')->insert([
			['name'=>'name1','age'=>25],
			['name'=>'name2','age'=>24]
			]);
		var_dump($bool);
	}
	//使用查询构造器更新数据Snippets
	public function GoDBUser2()
	{
		//根据内容更新内容
		//$num=DB::table('user')->where('id',5)
		//->update(['age'=>36]);
		//var_dump($num);
		
		//自增内容默认为1，不添加条件
		//$num=DB::table('user')->increment('age');
		//var_dump($num);
		//自增添加条件
		//$num=DB::table('user')->where('name','张宇')->increment('age',5);
		//var_dump($num);
		
		//自减
		//$num=DB::table('user')->decrement('age');
		//var_dump($num);
		
	    $num=DB::table('user')->where('id',5)->decrement('age',1,['name'=>'赵飞']);
		var_dump($num);
	}
	//使用查询构造器删除数据
	public function GoDBUser3()
	{
		//条件id删除
		//$num=DB::table('user')->where('id',4)->delete();
		//var_dump($num);
		
	    //条件范围删除
		//$num=DB::table('user')->where('id','>=',3)->delete();
		//var_dump($num);
		
		//条件like删除
		$num=DB::table('user')->where('name','like','%志%')->delete();
		var_dump($num);

		//删除整个表数据
		//DB::table('user')->truncate();
	}
	//使用查询构造器查询数据
	public function GoDBUser4()
	{
		//获取表中所有数据
		//$user=DB::table('user')->get();
		//dd($user);
		//查询返回一条数据
		//$user=DB::table('user')->first();
		//dd($user);

		//排序返回一条数据
		//$user=DB::table('user')->orderBy('id','desc')->first();
		//dd($user);
		
		//根据条件获取数据
		//$user=DB::table('user')->where('name','like','%na%')->get();
		//dd($user);
		
		//多查询条件查询
		//$user=DB::table('user')->whereRaw('id >=? and name like? and age=?',[2,'%na%',24])->get();
		//dd($user);
		
		//使用pluck返回指定一列，第二个则作为下标使用
	    //$user=DB::table('user')->pluck('name''id');
		//dd($user);
		
		//使用lists返回指定一列，第二个则作为下标使用
		//$user=DB::table('user')->lists('name','id');
		//dd($user);
		
		//select 返回需要的列
		//$user=DB::table('user')->select('name','age')->get();
		//dd($user);
		
		//chunk
		echo '<pre>';
		DB::table('user')->chunk(2,function($user){
			var_dump($user);
			if ('满足条件') {
				return false;
			}
		});
	}
	//使用聚合函数
	public function GoDBUser5()
	{
		//count行数
		//$num=DB::table('user')->count();
		//var_dump($num);
		
		//max的使用(最大)
		//$max=DB::table('user')->max('age');
		//var_dump($max);
		
		//min的使用(最小)
		//$min=DB::table('user')->min('age');
		//var_dump($min);
		
		//avg的使用(平均)
		//$avg=DB::table('user')->avg('age');
		//var_dump($avg);
		
		//sum的使用(列的和)
		$sum=DB::table('user')->sum('age');
		var_dump($sum);
	}
	//Eloquent ORM建立及查询数据
	public function ORM1()
	{
		//all
		$user=user::all();
		dd($user);
	}
}