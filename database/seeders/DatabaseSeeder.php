<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Admin::truncate();
        User::truncate();
        
        Admin::create([
            "name" => "Default Admin",
            "username" => "default_admin",
            "email" => "admin@default.com",
            "password" => Hash::make("password"),
        ]);

        User::create([
            "name" => "Default User",
            "username" => "default_user",
            "email" => "user@default.com",
            "password" => Hash::make("password"),
        ]);
    }
}
