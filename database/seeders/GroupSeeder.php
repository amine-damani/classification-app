<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('groups')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $groups = [
            [
                'name' => 'Administrator',
                'description' => $faker->text()
            ],
            [
                'name' => 'IT',
                'description' => $faker->text()
            ],[
                'name' => 'Consumer',
                'description' => $faker->text()
            ]
        ];
        foreach($groups as $group) {
            DB::table('groups')->insert($group);
        }
    }
}
