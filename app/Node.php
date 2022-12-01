<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    protected $table = 'node';

    protected $fillable = [
        'id', 'latitude', 'longitude'
    ];
}