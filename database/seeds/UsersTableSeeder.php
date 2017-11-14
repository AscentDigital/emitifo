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
            'username' => 'admin',
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('admin'),
            'company_id' => 1
        ]);
    }
}
