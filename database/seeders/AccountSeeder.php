<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Developer',
            'email' => 'itsupgavi@gmail.com',
            'username' => 'developer',
            'password' => Hash::make('developer'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
