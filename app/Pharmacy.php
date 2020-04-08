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

    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

//     public function medicines()
//     {
//         return $this->belongsToMany('App\Medicine')->withPivot('quantity');
//     }
}
