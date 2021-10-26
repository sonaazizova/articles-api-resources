<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\People;
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
      \App\Models\User::factory(10)->create();
      People::factory(20)->create();
      Article::factory(13)->create();
      Comment::factory(15)->create();
      
    }
}
