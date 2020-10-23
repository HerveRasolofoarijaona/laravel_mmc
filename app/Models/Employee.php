<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'company_id',
    	'email',
    	'phone',
	];

    public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' .$this->last_name;
	}
}
