<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\product;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    
    return [
        'name'=>'iphone 12',
            'price'=>44,
            'category_id'=>21,
            'producttype_id'=>1,
            'content'=>'fdf',
            'slug'=>'asdsa',
            'discount'=>5,
            'image'=>'sdfsd',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
    ];
});
