<?php

namespace Database\Seeders;

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
        $posts = \App\Models\User::factory(1)->create();
        dd($posts);

        // \App\Models\User::factory(10)->create();
    }
}
