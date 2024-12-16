<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder untuk role 'masyarakat'
        DB::table('users')->insert([
            'name' => 'User Masyarakat',
            'email' => 'masyarakat@example.com',
            'password' => Hash::make('password'),
            'role' => 'masyarakat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk role 'pelaksana'
        DB::table('users')->insert([
            'name' => 'User Pelaksana',
            'email' => 'pelaksana@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelaksana',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk role 'admin'
        DB::table('users')->insert([
            'name' => 'User Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk role 'superadmin'
        DB::table('users')->insert([
            'name' => 'User Superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}