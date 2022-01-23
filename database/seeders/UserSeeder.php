<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('users')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'first_name' => 'Amine',
            'last_name' => 'Damani',
            'email' => 'admin@admin.com',
            'phone' => '0614568998',
            'age' => 27,
            'type' => 'user',
            'group_id' => 1,
            'password' => bcrypt('password')
        ]);
    }
}
