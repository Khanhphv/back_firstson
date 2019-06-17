<?php

use Faker\Generator as Faker;
use App\Model\StoryCategory;
$factory->define(StoryCategory::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,10),
        'story_id'    => rand(1,10),
    ];
});
