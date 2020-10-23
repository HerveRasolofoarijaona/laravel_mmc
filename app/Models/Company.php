<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'web_site',
    	'logo',
	];

    public function employees()
	{
		return $this->hasMany('App\Models\Employee');
	}
}
