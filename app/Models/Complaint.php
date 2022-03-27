<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function utility(){
        return $this->belongsTo('App\Models\Utility');
    }

    public function unit(){
        return $this->belongsTo('App\Models\Unit');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
