<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\User;
use App\Models\Gender;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Role;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createGenders();
        $this->createRoles();
        $this->createAdminUsers();
        $this->createCashierUsers();
        User::factory(10)->create();
        Product::factory(15)->create();
    }

    private function createGenders(): void
    {
        Gender::factory()->create(['gender' => 'Male']);
        Gender::factory()->create(['gender' => 'Female']);
    }

    private function createRoles(): void
    {
        Role::factory()->create(['role' => 'Admin']);
        Role::factory()->create(['role' => 'Teacher']);
    }

    private function createAdminUsers(): void
    {
        $this->createUser('Juan', 'Santos', 'Dela Cruz', 1, 1, 'juan');
    }

    private function createCashierUsers(): void
    {
        $this->createUser('John', 'Santos', 'Doe', 1, 2, 'john');
    }

    private function createUser($firstName, $middleName, $lastName, $genderId, $roleId, $username): void
    {
        User::factory()->create([
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'gender_id' => $genderId,
            'role_id' => $roleId,
            'email_address' => fake()->safeEmail(),
            'username' => $username,
            'password' => bcrypt('1')
        ]);
    }
}
