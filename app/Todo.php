<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    
    public function parentRelation() {
        return $this->belongsTo('App\Todo', 'parent', 'id');
    }

    public function childRelation() {
        return $this->hasMany('App\Todo', 'parent', 'id');
    }

}
