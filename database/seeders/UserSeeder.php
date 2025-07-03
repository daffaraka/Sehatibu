<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'tanggal_lahir' => now(),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'name' => "User $i",
                'email' => "user$i@user.com",
                'password' => Hash::make("password$i"),
                'tanggal_lahir' => now()->subDays($i),
                'role' => 'user',
            ]);
        }
    }
}
