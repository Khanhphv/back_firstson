<?php
/**
 * Created by PhpStorm.
 * User: Admin 88
 * Date: 4/6/2019
 * Time: 10:44 PM
 */
use Illuminate\Database\Seeder;
use App\Story;
class StoryTableSeeder extends Seeder {
    public function run(){
        factory(Story::class,30)->create();
    }
}
