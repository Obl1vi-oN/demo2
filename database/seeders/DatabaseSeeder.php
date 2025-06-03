<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'user'
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'full_name' => 'Admin',
            'login' => 'admin',
            'phone' => '+7(999)-999-99-99',
            'email' => 'admin@admin.com',
            'password' => bcrypt('education'),
            'role_id' => 2,
        ]);
    }
}
