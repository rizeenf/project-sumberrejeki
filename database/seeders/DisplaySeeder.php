<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_displays')->insert([
            ['name' => 'TUMPUK', 'durability' => 30, 'created_at' => date('Y-m-d H:i:s')], 
            ['name' =>'GANTUNG', 'durability' => 90, 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'TEMPEL', 'durability' => 150, 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
