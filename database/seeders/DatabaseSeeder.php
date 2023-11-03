<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MessageList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make("123123123"),
            'role' => "super_admin",
            'status' => "active",
        ]);

        $this->call([
            SClassSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            MarkSheetSeeder::class,
            MessageListSeeder::class,
        ]);
    }
}
