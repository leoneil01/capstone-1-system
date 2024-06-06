<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Gender;
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
        $this->createCategories();
        $this->createProductSuppliers();
        $this->createBrandNames();
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
        Role::factory()->create(['role' => 'Cashier']);
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

    private function createCategories(): void {
        Category::factory()->create(['category_name' => 'Fruits']);
        Category::factory()->create(['category_name' => 'Canned Goods']);
        Category::factory()->create(['category_name' => 'Dairy Products']);
        Category::factory()->create(['category_name' => 'Meat']);
        Category::factory()->create(['category_name' => 'Fish & Seafood']);
        Category::factory()->create(['category_name' => 'Condiments & Spices']);
        Category::factory()->create(['category_name' => 'Snacks']);
        Category::factory()->create(['category_name' => 'Bread & Bakery']);
        Category::factory()->create(['category_name' => 'Beverages']);
        Category::factory()->create(['category_name' => 'Baking']);
        Category::factory()->create(['category_name' => 'Frozen Foods']);
        Category::factory()->create(['category_name' => 'Personal Care']);
        Category::factory()->create(['category_name' => 'Health Care']);
        Category::factory()->create(['category_name' => 'Household & Cleaning Supplies']);
        Category::factory()->create(['category_name' => 'Baby Items']);
        Category::factory()->create(['category_name' => 'Pet Care']);
    }

    private function createProductSuppliers(): void {
        $this->createSupplier('UNIVERSAL ROBINA CORPORATION', 'Quezon, Manila', 'Philippines');
        $this->createSupplier('SAN MIGUEL FOODS, INC.', 'Pasig, Manila', 'Philippines');
        $this->createSupplier('COCA-COLA BEVERAGES PHILIPPINES, INC.', 'Taguig, Manila', 'Philippines');
        $this->createSupplier('MONDE NISSIN CORPORATION', 'Sta. Rosa, Laguna', 'Philippines');
        $this->createSupplier('PEPSI-COLA PRODUCTS PHILIPPINES, INC.', 'Muntinlupa, Manila', 'Philippines');
        $this->createSupplier('NUTRI-ASIA, INC.', 'Taguig, Manila', 'Philippines');
        $this->createSupplier('BOUNTY FRESH FOOD, INC.', 'Caloocan City, Manila', 'Philippines');
    }

    private function createSupplier($supplierName, $address, $country): void {
        Supplier::factory()->create([
            'supplier_name' => $supplierName,
            'contact_name' => fake()->name(),
            'address' => $address,
            'postal_code' => fake()->postcode(),
            'country' => $country,
            'contact_number' => fake()->phoneNumber()
        ]);
    }

    private function createBrandNames(): void {
        Brand::factory()->create(['brand_name' => 'Jack n Jill']);
        Brand::factory()->create(['brand_name' => 'C2']);
        Brand::factory()->create(['brand_name' => 'Great Taste']);
        Brand::factory()->create(['brand_name' => 'Cream-O']);
        Brand::factory()->create(['brand_name' => 'Magic Crackers']);

        Brand::factory()->create(['brand_name' => 'Magnolia']);
        Brand::factory()->create(['brand_name' => 'Purefoods']);
        Brand::factory()->create(['brand_name' => 'B-Meg']);
        Brand::factory()->create(['brand_name' => 'Monterey']);
        Brand::factory()->create(['brand_name' => 'Star']);

        Brand::factory()->create(['brand_name' => 'Coca-Cola']);
        Brand::factory()->create(['brand_name' => 'Sprite']);
        Brand::factory()->create(['brand_name' => 'Royal']);
        Brand::factory()->create(['brand_name' => 'Sarsi']);
        Brand::factory()->create(['brand_name' => 'Minute Maid']);

        Brand::factory()->create(['brand_name' => 'Lucky Me!']);
        Brand::factory()->create(['brand_name' => 'Sky Flakes']);
        Brand::factory()->create(['brand_name' => 'Monde Specials']);
        Brand::factory()->create(['brand_name' => 'Bingo']);
        Brand::factory()->create(['brand_name' => 'Fita']);

        Brand::factory()->create(['brand_name' => 'Pepsi']);
        Brand::factory()->create(['brand_name' => '7Up']);
        Brand::factory()->create(['brand_name' => 'Mountain Dew']);
        Brand::factory()->create(['brand_name' => 'Mirinda']);
        Brand::factory()->create(['brand_name' => 'Gatorade']);

        Brand::factory()->create(['brand_name' => 'Datu Puti']);
        Brand::factory()->create(['brand_name' => 'Mang Tomas']);
        Brand::factory()->create(['brand_name' => 'UFC']);
        Brand::factory()->create(['brand_name' => 'Silver Swan']);
        Brand::factory()->create(['brand_name' => 'Golden Fiesta']);

        Brand::factory()->create(['brand_name' => 'Bounty Fresh']);
        Brand::factory()->create(['brand_name' => 'Top Torikatsu']);
        Brand::factory()->create(['brand_name' => 'Holiday']);
        Brand::factory()->create(['brand_name' => 'Q-Chicken']);
        Brand::factory()->create(['brand_name' => 'Darling Cornish']);
    }
}
