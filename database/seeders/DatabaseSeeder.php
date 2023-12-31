<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app(RoleAndPermissionsSeeder::class)->run();
        app(UsersSeeder::class)->run();
        app(ProcessesSeeder::class)->run();
    }
}
