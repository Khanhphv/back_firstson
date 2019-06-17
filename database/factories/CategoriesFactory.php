<?php

use Faker\Generator as Faker;
use App\Model\Category;

$factory->define(Category ::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'out_flag' => rand(0,1)
    ];
});
