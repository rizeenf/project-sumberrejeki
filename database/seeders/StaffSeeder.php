<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_staff')->insert([
            'name' => 'Developer',
            'gender' => 'L',
            'phone' => '085210310305',
            'jabatan_id' => '1',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
