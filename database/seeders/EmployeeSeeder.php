<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /** * Run the database seeds. */ public function run(): void
    {
        DB::table('employees')->insert([
            [
                'firstname' => 'Firman',
                'lastname' => 'Bayu',
                'email' => 'firmanbayu80@gmail.com',
                'age' => 20, 'position_id' => 1
            ],
            [
                'firstname' => 'Shaquille',
                'lastname' => 'Wibisono',
                'email' => 'shaquillewibisono@gmail.com',
                'age' => 25, 'position_id' => 2
            ],
            [
                'firstname' => 'Zulfa',
                'lastname' => 'Azka',
                'email' => 'zulfaazka@gmail.com',
                'age' => 23,
                'position_id' => 3
            ],
        ]);
    }
}
