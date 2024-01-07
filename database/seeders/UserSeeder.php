<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administator',
            'email' => 'apotek_admin@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'admin',
        ]);

        // $data = [
        //     [
        //         'name' => 'Kasir',
        //         'email' => 'apotek_kasir@gmail.com',
        //         'password' => Hash::make('kasirapotek'),
        //         'role' => 'cashier',
        //     ],
        // ];

        // User::insert($data);
    }
}
