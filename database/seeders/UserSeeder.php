<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'id_asisten' => 'A12345',
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'Admin',
                'photo' => 'admin.jpg',
                'password' => Hash::make('admin123'),
            ],
            [
                'id_asisten' => 'S12345',
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'role' => 'Staff',
                'photo' => 'staff.jpg',
                'password' => Hash::make('staff123'),
            ],
            [
                'id_asisten' => 'PJ12345',
                'name' => 'PJ User',
                'email' => 'pj@example.com',
                'role' => 'PJ',
                'photo' => 'pj.jpg',
                'password' => Hash::make('pj1234'),
            ],
            [
                'id_asisten' => 'AS12345',
                'name' => 'Asisten User',
                'email' => 'asisten@example.com',
                'role' => 'Asisten',
                'photo' => 'asisten.jpg',
                'password' => Hash::make('asisten123'),
            ],
        ];

        foreach ($userData as $data) {
            User::create($data);
        }
    }
}
