<?php

use Faker\Generator as Faker;
use App\Story;
$factory->define(Story::class, function (Faker $faker) {
    return [
        'name'        => $faker->text(10),
        'likes'        => rand(0,10),
        'views'        => rand(1000,2000),
//        'category_id' => rand(1,10),
        'author_id'   => rand(1,10),
        'status'      => rand(0,1),

    ];
});
