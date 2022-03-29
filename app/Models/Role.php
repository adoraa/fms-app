<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Const_;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const IS_FACILITY_MANAGER = 2;
    public const IS_ESTATE_MANAGER = 3;
    public const IS_STORE_MANAGER = 11;
    public const IS_STAFF = 6;
    public const IS_STUDENT = 7;
    public const IS_ELECTRICAL = 10;
    public const IS_WATER_AND_SEWAGE = 12;
    public const IS_MECHANICAL = 13;
    public const IS_WOOD_WORKS = 14;
    public const IS_CIVIL = 17;

    public static function list()
    {
        return static::all()->pluck('id', 'title');
    }

    public function jobs(){
        return $this->hasMany('App\Models\Job');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
