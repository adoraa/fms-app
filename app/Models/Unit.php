<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function head_of_unit(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function complaint(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
}
