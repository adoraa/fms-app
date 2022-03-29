<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function complaints(){
        return $this->belongsToMany(Complaint::class, 'material_complaints', 'material_id', 'complaint_id');
    }
}
