<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Admin',
                'fullname' => 'Administrator',
                'email' => 'wopss@gmail.com',
                'password' => Hash::make('wopss123'),
                'role' => 'admin',
            ]
        );
        foreach ($data as $d) {
            User::create([
                'name' => $d['name'],
                'fullname' => $d['fullname'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role'],
            ]);
        }
    }
}
