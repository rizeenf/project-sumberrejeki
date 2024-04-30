<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_jabatans')->insert([
            ['name' => 'Developer', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'IT Support', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Area Bussiness Developer', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Staff Merchandiser', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Supervisor Salesman', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Kepala Depo', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Staff Salesman', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Sales Admin Support', 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
