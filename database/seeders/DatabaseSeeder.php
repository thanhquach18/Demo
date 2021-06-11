<?php

namespace Database\Seeders;
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
        User::addRow('Admin', 'admin@gmail.com', '678910');
        // \App\Models\User::factory(10)->create();
    }
}
