<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'type' => 3,
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Approv User',
                'email' => 'approval@approval.com',
                'type' => 2,
                'password' => bcrypt('approval'),
            ],
            [
                'name' => 'valid User',
                'email' => 'validasi@validasi.com',
                'type' => 1,
                'password' => bcrypt('validasi'),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'type' => 0,
                'password' => bcrypt('user'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
