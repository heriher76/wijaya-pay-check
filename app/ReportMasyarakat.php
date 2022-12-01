<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportMasyarakat extends Model
{
    //
    protected $table = 'report_masyarakat';

    protected $fillable = [
        'user_id', 'judul', 'status', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
