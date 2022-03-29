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

    public function job(){
        return $this->belongsTo('App\Models\Job');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function head_of_room_facility(){
        return $this->belongsTo('App\Models\User', 'head_of_user', 'id');
    }

    public function estate_manager(){
        return $this->belongsTo('App\Models\User', 'estate_manager_approval', 'id');
    }

    public function store_manager(){
        return $this->belongsTo('App\Models\User', 'material_gotten', 'id');
    }

    public function head_of_unit(){
        return $this->belongsTo('App\Models\User', 'head_of_unit_approval', 'id');
    }

    public function assigned_user(){
        return $this->belongsTo('App\Models\User', 'user_assigned', 'id');
    }

    public function materials(){
        return $this->belongsToMany(Material::class, 'material_complaints', 'complaint_id', 'material_id');
    }

    public function complaint_materials(){
        return $this->hasMany('App\Models\MaterialComplaint');
    }
}
