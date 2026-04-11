<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->insert([
            ['nama_role' => 'superadmin'],
            ['nama_role' => 'bumdes'],
            ['nama_role' => 'seller'],
            ['nama_role' => 'user'],
        ]);
    }
}
