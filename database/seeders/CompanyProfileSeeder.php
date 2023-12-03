<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_profiles')->insert([
            'name' => 'Nepal Tamang Ghedung',
            'logo' => 'logo.png',
            'email' => 'info@gmail.com',
        ]);
    }
}
