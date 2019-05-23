<?php

use Illuminate\Database\Seeder;
use App\Model\StoryCategory;
class StoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StoryCategory::class, 30)->create();
    }
}
