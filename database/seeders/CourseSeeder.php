<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
           [ 'name' => 'مادة الجغرافيا'],
           [ 'name' => 'مادة التاريخ'],
        ]);
    }
}