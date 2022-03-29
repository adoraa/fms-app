<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialComplaint extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];
    protected $guarded = [];
    public $incrementing = true;

    public function material(){
        return $this->belongsTo('App\Models\Material', 'material_id');
    }

    public function complaint(){
        return $this->belongsTo('App\Models\Complaint', 'complaint_id');
    }

}
