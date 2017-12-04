<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class url extends Model
{
	protected $guarded = [];
	public $timestamps = false;
	
    public function getRouteKeyName() {
    	return 'key';
    }
}
