<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'juanjo',
            'email' => 'juanjosr98@gmail.com',
            'password' => bcrypt('001122'),
        ]);

        User::factory(10)->create();
        Invoice::factory(100)->create();
    }
}
