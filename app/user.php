<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
	//指定表名
	protected $table ='user';

    //指定id
	protected $primarykey='id';
}