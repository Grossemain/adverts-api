<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user@example.com',
                'password' => Hash::make('azertyuiop'),
                'email_verified_at' => now(),
                'role_id' => '1',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('azertyuiop'),
                'email_verified_at' => now(),
                'role_id' => '2',
            ],
        ]);
        User::factory(20)->create();
    }
}
