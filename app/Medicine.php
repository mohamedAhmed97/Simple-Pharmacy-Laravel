<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'medicine_name',
        'medicine_quantity',
        'medicine_type',
        'medicine_price',   
    ];


    public function pharmacies()
    {
        return $this->belongsToMany('App\Pharmacy')->as('medicines_pharmacies')->withPivot('quantity');
    }
   
}



