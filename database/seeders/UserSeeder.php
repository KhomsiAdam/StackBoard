<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123**'),
            'role' => User::ADMIN
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => bcrypt('johndoe'),
            'role' => User::DEFAULT
        ]);

        User::factory()->count(10)->create();
    }
}
