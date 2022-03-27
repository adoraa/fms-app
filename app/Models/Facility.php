<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }

    public function utilities(){
        return $this->hasMany('App\Models\Utility');
    }

    public function head_of_facility(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
