<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture_order extends Model
{
    protected $fillable = [
        'avatar',
        'order_id',
    ];
}
