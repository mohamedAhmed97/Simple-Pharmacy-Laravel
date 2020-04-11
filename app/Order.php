<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'order_name',
      'Deliver_Address',
      'dr_id',
      'isinsured',
      'status',
      'quantity',
      'price',
      'status',
      'totalprice',
      'area_id',
      'api_token',


    ];
}
