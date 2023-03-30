<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallationStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $installation_steps = [
            ['step' => 1, 'name' => 'ติดตั้งตัวเครื่อง', 'image' => null, 'description' => null, 'coil' => 'evaporator'],
            ['step' => 2, 'name' => 'ท่อน้ำกับท่อน้ำทิ้ง', 'image' => null, 'description' => null, 'coil' => 'evaporator'],
            ['step' => 3, 'name' => 'สายไฟ', 'image' => null, 'description' => null, 'coil' => 'evaporator'],
            ['step' => 1, 'name' => 'ติดตั้งตัวเครื่อง', 'image' => null, 'description' => null, 'coil' => 'condenser'],
            ['step' => 2, 'name' => 'สายไฟ', 'image' => null, 'description' => null, 'coil' => 'condenser']
        ];
        DB::table('installation_steps')->insert($installation_steps);
    }
}
