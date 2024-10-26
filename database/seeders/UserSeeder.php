<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([


            //admin

            [
                'firstname' => 'ADMIN' ,
                'lastname' => 'admin' ,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin' ,
               'status' => 'active' ,

            ],

            //agent

            [
                'firstname' => 'agent' ,
                'lastname' => 'agent' ,
                'email' => 'agent@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'agent' ,
               'status' => 'active' ,

            ],

            //user

            [
                'firstname' => 'USER' ,
                'lastname' => 'user' ,
                'email' => 'user@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'user' ,
               'status' => 'active' ,

            ],



        ]);
    }
}
