<?php

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            'title' => 'Sample Campaign',
            'description' => 'Sample description',
            'company_id' => 1,
            'created_by' => 1
        ]);
    }
}
