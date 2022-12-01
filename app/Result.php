<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    protected $table = 'result';
    protected $fillable = [
        'emergency_report_id', 'gn', 'hn', 'fn'
    ];

    public function emergencyReport()
    {
        return $this->belongsTo('App\Emergency', 'emergency_report_id', 'id');
    }
}