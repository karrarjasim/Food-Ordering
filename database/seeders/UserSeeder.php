<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\RoleName;
use App\Models\Role;
use App\Models\User;
use App\Models\City;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAdminUser();
        $this->createVendorUser(); 
        $this->createCustomerUser(); 
    }
 
    public function createAdminUser()
    {
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::ADMIN->value)->first());
    }

    public function createVendorUser() 
    { 
        $vendor = User::create([ 
            'name'     => 'Restaurant owner', 
            'email'    => 'vendor@admin.com', 
            'password' => bcrypt('password'), 
        ]); 
 
        $vendor->roles()->sync(Role::where('name', RoleName::VENDOR->value)->first()); 
 
        $vendor->restaurant()->create([ 
            'city_id' => City::where('name', 'Aalborg')->value('id'), 
            'name'    => 'Restaurant 001', 
            'address' => 'Address SJV14', 
        ]); 
    } 

    public function createCustomerUser() 
    { 
        $vendor = User::create([ 
            'name'     => 'Loyal Customer', 
            'email'    => 'customer@admin.com', 
            'password' => bcrypt('password'), 
        ]); 
    
        $vendor->roles()->sync(Role::where('name', RoleName::CUSTOMER->value)->first()); 
    } 
}
