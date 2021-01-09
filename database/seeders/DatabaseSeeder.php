<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create(
            [
                'name'    => 'ryften',
                'email'   => 'admin@admin.com',
                'password'=> bcrypt('123456'),
            ]
        );

        Post::factory(50)->create();
    }
}
