<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function facility(){
        return $this->belongsTo('App\Models\Facility');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function complaint(){
        return $this->belongsTo('App\Models\Complaint');
    }
}
