<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Post, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(50)->create();
    }
}
