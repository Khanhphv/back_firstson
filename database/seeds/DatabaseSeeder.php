<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(CategoriesTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StoryTableSeeder::class);
        $this->call(StoryCategorySeeder::class);
    }
}
