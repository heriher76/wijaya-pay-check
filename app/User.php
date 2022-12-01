<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nrp', 'nama', 'pangkat', 'jabatan', 'email', 'image', 'no_hp', 'lat', 'long', 'password', 'is_admin', 'is_personil', 'is_personil_active', 'is_masyarakat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function emergencyReport()
    {
        return $this->hasMany('App\EmergencyReport', 'user_id');
    }

    public function report()
    {
        return $this->hasMany('App\Report', 'user_id');
    }

    public function reportMasyarakat()
    {
        return $this->hasMany('App\ReportMasyarakat', 'user_id');
    }
}