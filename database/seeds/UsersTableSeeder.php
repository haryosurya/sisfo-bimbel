<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$w/UociwTgoCUsxycyaYcpOCMobThEh457BP53YCgqsHjM9PdBDOlS',
            'remember_token' => null,
            'created_at'     => '2019-07-08 09:55:09',
            'updated_at'     => '2019-07-08 09:55:09',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
