<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brnzone extends Model
{
    //protected $primaryKey = 'BrnCode';

    protected $fillable = [
        'BrnCode', 'BrnName', 'AreaId'
    ];
}