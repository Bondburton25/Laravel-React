<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallationStepInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $installation_step_inspections = [
            // ['installation_step_id' => 1, 'name' => 'ตำแหน่งถูกต้องตามแบบ', 'image' => null, 'description' => null],
            // ['installation_step_id' => 1, 'name' => 'ความแข็งแรงของซัพพอร์ต', 'image' => null, 'description' => null],
            // ['installation_step_id' => 1, 'name' => 'ระดับสมดุล ไม่เอียง (ใช้ระดับน้ำวัด)', 'image' => null, 'description' => null],
            // ['installation_step_id' => 1, 'name' => 'ระยะสูง-ต่ำ (เช็คกับงานฝ้าแล้ว)', 'image' => null, 'description' => null]
            // ['installation_step_id' => 2, 'name' => 'ขนาดท่อน้ำยาถูกต้อง', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'เดินท่อบนซัพพอร์ต อยู่ในระยะ 1-1.2 เมตร', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'หุ้มฉวนและติดเทปที่ฉนวนเรียบร้อยไม่มีรอยขาดหรือรอยต่อที่ยังไม่ได้ปิดฉนวน', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'เลี้ยงไนโตรเจนระหว่างติดตั้ง', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'สุ่มตัดท่อ ว่าท่อสะอาด', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'ทดสอบไนโตรเจนแล้ว', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'เดินท่อบนซัพพอร์ต อยู่ในระยะ 0.80-1 เมตร', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'สโลฟต้องได้อัตราส่วน 1:100', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'ถ้าใช้รุ่นที่เป็นปั๊มระยะชู้ตไม่เกิน 30 ซม. ความห่างช่วงเริ่มต้นไม่เกิน 10 ซม.', 'image' => null, 'description' => null],
            // ['installation_step_id' => 2, 'name' => 'หุ้มฉวนและติดเทปที่ฉนวนเรียบร้อยไม่มีรอยขาดหรือรอยตอทที่ยังไม่ได้ปิดฉนวน', 'image' => null, 'description' => null],
            // ['installation_step_id' => 3, 'name' => 'เข้าสายถูกต้องและใช้หางปลา', 'image' => null, 'description' => null],
            ['installation_step_id' => 4, 'name' => 'ตำแหน่งถูกต้องตามแบบ', 'image' => null, 'description' => null],
            ['installation_step_id' => 4, 'name' => 'ซัพพอร์ตคอยล์ร้อนมีหรือไม่  ', 'image' => null, 'description' => null]
        ];
        DB::table('installation_step_inspections')->insert($installation_step_inspections);
    }
}
