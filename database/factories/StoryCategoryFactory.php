<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-05-21
 * Time: 14:33
 */

use Faker\Generator as Faker;
use App\Model\StoryCategory;

$factory->define(StoryCategory ::class, function (Faker $faker) {
    return [
        'story_id' => rand(1,10),
        'category_id' => rand(1,10)
    ];
});