<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'name' => 'TKJ',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'RPL',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'DKV',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'Akutansi',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'Pemasaran',
                'icon' => 'building-castle',
            ],
            [
                'name' => 'Perkantoran',
                'icon' => 'building-castle',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
