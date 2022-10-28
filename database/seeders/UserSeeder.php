<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Create default admin user
     *
     * @return void
     */
    public function create_admin_user()
    {
        if (!User::whereEmail("admin@admin.com")->exists()) {
            User::create([
                'name' => "Admin",
                'email' => "admin@admin.com",
                'password' => bcrypt("Admin123!"),
            ]);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create_admin_user();
        User::factory(1000)->create();
    }
}
