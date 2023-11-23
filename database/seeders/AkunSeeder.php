<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
            [
                'name'      =>'admin',
                'email'     =>'admin@gmail.com',
                'role'     =>'admin',
                'password'  => bcrypt('12345678'),
            ], [
                'name'      =>'user',
                'email'     =>'user@gmail.com',
                'role'     =>'user',
                'password'  => bcrypt('12345678'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }

}
