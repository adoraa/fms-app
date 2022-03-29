<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function facility(){
        return $this->belongsTo('App\Models\Facility');
    }

    public function utilities(){
        return $this->hasMany('App\Models\Utility');
    }

    public function head_of_room(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
