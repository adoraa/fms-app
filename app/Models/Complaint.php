<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    public function utilities(){
        return $this->hasMany('App\Models\Utility');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
