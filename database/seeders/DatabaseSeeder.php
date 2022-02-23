<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(50)->create();

        User::create([
            'nama' => 'Muhammad Syafwan Ardiansyah',
            'username' => 'syafwan000',
            'role' => 'Manager',
            'password' => bcrypt('password')
        ]);
    }
}
