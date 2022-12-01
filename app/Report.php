<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'report';

    protected $fillable = [
        'user_id', 'judul', 'isi', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
