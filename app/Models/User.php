<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Complaint;
use App\Models\Room;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function complaints(){
        return $this->hasMany('App\Models\Complaint');
    }

    public function rooms(){
        return $this->hasMany('App\Models\Room', 'user_id', 'id');
    }

    public function facilities(){
        return $this->hasMany('App\Models\Facility', 'user_id', 'id');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function assigned_complaints(){
        return $this->hasMany('App\Models\Complaint', 'user_assigned', 'id');
    }

}
