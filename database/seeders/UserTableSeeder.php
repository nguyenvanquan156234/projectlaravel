<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

        [
            'email'=>'nquan7271@gmail.com',
            'name'=>'Quan',
            'password'=> bcrypt('123456'),
            'level'=>1
        ],
        [
            'email'=>'admin@gmail.com',
            'name'=>'Admin',
            'password'=> bcrypt('123456'),
            'level'=>1
        ]

        ];
        DB::table('vp_users')->insert($data);
    }
}
