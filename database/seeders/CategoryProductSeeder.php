<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_category_products')->insert([
            ['name' => 'TAB', 'created_at' => date('Y-m-d H:i:s')], 
            ['name' =>'TISSUE', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'MIKA', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'DUS', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'OTHERS', 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
