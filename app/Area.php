<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $primaryKey = 'AreaId';

    protected $fillable = [
        'AreaName', 'AreaPhone'
    ];

    public function zone()
    {
        return $this->hasOne('App\Brnzone', 'AreaId');
    }
}