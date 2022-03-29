<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Role(){
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function complaints(){
        return $this->hasMany('App\Models\Complaint', 'job_id', 'id');
    }
}
