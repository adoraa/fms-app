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
    public const IS_ELECTRICIAN = 10;
    public const IS_PLUMBER = 12;
    public const IS_WELDER = 13;
    public const IS_CARPENTER = 14;

    public static function list()
    {
        return static::all()->pluck('id', 'title');
    }

    public function unit(){
        return $this->hasOne('App\Models\Unit');
    }
}
