<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Gender::factory()->create([ 'gender' => 'Male ']);

        Gender::factory()->create([ 'gender' => 'Female' ]);

        Role::factory()->create([ 'role' => 'Admin' ]);

        Role::factory()->create([ 'role' => 'Cashier' ]);

        User::factory()->create([
            'first_name' => 'Juan',
            'middle_name' => 'Santos',
            'last_name' => 'Dela Cruz',
            'gender_id' => 1,
            'role_id' => 1,
            'email_address' => fake()->safeEmail(),
            'username' => 'juan',
            'password' => bcrypt('1')
        ]);

        User::factory()->create([
            'first_name' => 'John',
            'middle_name' => 'Santos',
            'last_name' => 'Doe',
            'gender_id' => 1,
            'role_id' => 2,
            'email_address' => fake()->safeEmail(),
            'username' => 'john',
            'password' => bcrypt('1')
        ]);
    }
}
