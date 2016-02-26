<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poolwindow extends Model
{
    
    public function poolRelation() {
    	return $this->belongsTo('App\Pool', 'pool', 'id');
	}

    public function getAbcAttribute($value)
    {
        return "aaa";
    }

}
