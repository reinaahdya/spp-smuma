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
        User::insert([
            [
                'name' => 'Reina Ahdya',
                'email' => 'reina@gmail.com',
                'role' => 'admin',
                'nip' => '362155401175',
                'telepon' => '087849672106',
                'alamat' => 'jajang surat',
                'password' => bcrypt('reina280703'),
            ]
        ]);
    }
}
