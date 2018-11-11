<?php
namespace app;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
	//指定表名
	protected $table='user';

	//指定id主键
	protected $primaryKey='id';
}