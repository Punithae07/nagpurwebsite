<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'superadmin@admin.com'],
            ['name' => 'Super Admin', 'password' => bcrypt('password')]
        );

        User::query()->firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        $this->call(WebsiteCmsSeeder::class);
    }
}