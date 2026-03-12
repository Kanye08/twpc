<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'              => 'Super Admin',
                'password'          => Hash::make('password'),
                'is_admin'          => true,
                'is_blocked'        => false,
                'email_verified_at' => now(),
            ]
        );

        // Regular user 1
        $userOne = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name'              => 'Test User',
                'password'          => Hash::make('password'),
                'is_admin'          => false,
                'is_blocked'        => false,
                'email_verified_at' => now(),
            ]
        );

        // Regular user 2
        $userTwo = User::firstOrCreate(
            ['email' => 'jane@example.com'],
            [
                'name'              => 'Jane Doe',
                'password'          => Hash::make('password'),
                'is_admin'          => false,
                'is_blocked'        => false,
                'email_verified_at' => now(),
            ]
        );

        // Blocked user
        User::firstOrCreate(
            ['email' => 'blocked@example.com'],
            [
                'name'              => 'Blocked User',
                'password'          => Hash::make('password'),
                'is_admin'          => false,
                'is_blocked'        => true,
                'email_verified_at' => now(),
            ]
        );

        // Seed products for user one
        if ($userOne->products()->count() === 0) {
            Product::factory(3)->create(['user_id' => $userOne->id]);
        }

        // Seed products for user two
        if ($userTwo->products()->count() === 0) {
            Product::factory(3)->create(['user_id' => $userTwo->id]);
        }
    }
}