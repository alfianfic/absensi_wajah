<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
=======
        // User::factory()->create([
        //     'nik' => '35060',
        //     'nama' => 'tester',
        //     'role' => '1',
        //     'password' => '1',
        // ]);
        User::create([
            'nik' => '35060',
            'nama' => 'tester',
            'role' => '1',
            'password' => '1',
            'jenis_kelamin' => 'L',
            'alamat' => 'Mlg'
        ]);
>>>>>>> e7c58b2c5560a1bf91c8e8181228efb663760715
    }
}
