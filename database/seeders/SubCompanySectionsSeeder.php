<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubCompanySectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_company_sections')->insert([
            [
                'section_name' => 'Team',
                'slug' => 'team',
                'status' => 'on'
            ],
            [
                'section_name' => 'Activities',
                'slug' => 'activities',
                'status' => 'on'
            ]
        ]);
    }
}
