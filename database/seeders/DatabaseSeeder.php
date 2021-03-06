<?php

namespace Database\Seeders;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Post;
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
        Post::truncate();
        Blogger::truncate();
        Category::truncate();

        Post::factory(10)->create();



    }
}
