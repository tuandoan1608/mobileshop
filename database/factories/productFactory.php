<?php



use App\product;
use Carbon\Carbon;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

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
