<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'name' => 'Ico'
        ];

        DB::table('admins')->insert($admin);
    }
}
