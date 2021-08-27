<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'ADMIN',
            'name' => 'Admin Micommerce',
            'email' => 'admin@micommerce.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
