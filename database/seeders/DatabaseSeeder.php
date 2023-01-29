<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\User;
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

        $author = User::factory()
            ->create();

        $challenges = Challenge::factory()->count(10)->for($author, 'author')->create();
    }
}
