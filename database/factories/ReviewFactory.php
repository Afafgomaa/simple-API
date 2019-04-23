<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\review;
use App\product;
use Faker\Generator as Faker;

$factory->define(review::class, function (Faker $faker) {
    return [
        'product_id' => function(){
          return product::all()->random();
        },
        'review' => $faker->paragraph,
        'customer' => $faker->name,
        'star' => $faker->numberBetween(0,5)
    ];
});
