<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmergencyReport extends Model
{
    //
    protected $table = 'emergency_report';

    protected $fillable = [
        'user_id', 'judul', 'foto', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function result()
    {
        return $this->hasMany('App\Result', 'emergency_report_id');
    }
}
