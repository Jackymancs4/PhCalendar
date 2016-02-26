<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    public function poolwindowsRelation() {
        return $this->hasMany('App\Poolwindow', 'pool', 'id');
    }

}
