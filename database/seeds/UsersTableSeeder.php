<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
            'admin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'uye',
            'email' => 'uye@test.com',
            'password' => bcrypt('123456'),
            'admin' => false
        ]);
    }
}