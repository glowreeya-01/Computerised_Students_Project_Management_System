<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User:truncate();
        $users = [
            [
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'reg_no' => '232993',
            'role' => '2',
            'status' => '1',
            'isAdmin' => '1',
            'password' => '12345678',
        ],
            [
            'firstname' => 'Student',
            // 'user_id' => '',
            'lastname' => '1',
            'email' => 'stud@gmail.com',
            'reg_no' => '164662',
            'status' => '1',
            'role' => '1',
            'isAdmin' => '0',
            'password' => '12345678',
        ],
            [
            'firstname' => 'Stdent',
            'lastname' => '2',
            'email' => 'stud2@gmail.com',
            'reg_no' => '90543',
            'status' => '1',
            'role' => '1',
            'isAdmin' => '0',
            'password' => '12345678',
        ],
            [
            'firstname' => 'Teacher',
            'lastname' => '1',
            'email' => 'teacher@gmail.com',
            'reg_no' => '67267320',
            'status' => '1',
            'role' => '2',
            'isAdmin' => '0',
            'password' => '12345678',
        ],
            [
            'firstname' => 'Teacher2',
            'lastname' => '2',
            'email' => 'teacher2@gmail.com',
            'reg_no' => '1232312',
            'status' => '1',
            'role' => '2',
            'isAdmin' => '0',
            'password' => '12345678',
        ],
    ];

    


    foreach ($users as $user) {
        User::create([
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'reg_no' => $user['reg_no'],
            'status' => $user['status'],
            'role' => $user['role'],
            'isAdmin' => $user['isAdmin'],
            'password' => Hash::make($user['password']),
        ]);
    }
   


    }
}
