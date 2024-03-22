<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'cate_name'=>'iPhone',
                'cate_slug'=> Str::slug('iPhone')
            ],
            [
                'cate_name'=>'Samsung',
                'cate_slug'=> Str::slug('Samsung')
            ]
        ];
        DB::table('vp_categories')->insert($data);
    }
}
