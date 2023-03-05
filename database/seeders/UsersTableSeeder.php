<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'user1@mail.com',
            'password' => bcrypt('123456'),
            'name' => 'User'
        ];

        DB::table('users')->insert($admin);
    }
}
