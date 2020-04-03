<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'ph_name',
        'area_id',
        'ph_avatar' 
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
