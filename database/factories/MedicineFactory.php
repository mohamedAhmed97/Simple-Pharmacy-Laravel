<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicine;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;


$factory->define(Medicine::class, function (Faker $faker) {
    return [
        'medicine_name' => $faker->randomElement(['Panadol','Panadol Extra','Omega-3',
        'Maalox','Aspirin','Augmentin','Flagyl','Motilium']),
        'medicine_quantity' => $faker->numberBetween(5, 200),
        'medicine_type' => $faker->randomElement(['Pills','Liquid','Tablet',
                'Capsules','Drops','Cough Syrup','Herbal Medicine','Injection']),
        'medicine_price' => $faker->numberBetween(1,6000)
      
      
    ];
});