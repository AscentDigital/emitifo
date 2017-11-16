<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'title' => 'Sample Company',
            'slug' => 'sample-company',
            'description' => 'Sample description',
            'code' => '12404284172'
        ]);
    }
}
