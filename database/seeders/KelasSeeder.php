<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelasData = [
            [
                'jurusan' => 'Computer Science',
                'fakultas' => 'Faculty of Computer Science',
                'tingkat' => '1',
                'nama_kelas' => 'CS101',
            ],
            [
                'jurusan' => 'Engineering',
                'fakultas' => 'Faculty of Engineering',
                'tingkat' => '2',
                'nama_kelas' => 'ENG202',
            ],
            [
                'jurusan' => 'Mathematics',
                'fakultas' => 'Faculty of Mathematics',
                'tingkat' => '3',
                'nama_kelas' => 'MAT303',
            ],
            [
                'jurusan' => 'Physics',
                'fakultas' => 'Faculty of Physics',
                'tingkat' => '4',
                'nama_kelas' => 'PHY404',
            ],
            [
                'jurusan' => 'Biology',
                'fakultas' => 'Faculty of Biology',
                'tingkat' => '1',
                'nama_kelas' => 'BIO101',
            ],
            [
                'jurusan' => 'Chemistry',
                'fakultas' => 'Faculty of Chemistry',
                'tingkat' => '2',
                'nama_kelas' => 'CHEM202',
            ],
            [
                'jurusan' => 'Literature',
                'fakultas' => 'Faculty of Literature',
                'tingkat' => '3',
                'nama_kelas' => 'LIT303',
            ],
            [
                'jurusan' => 'History',
                'fakultas' => 'Faculty of History',
                'tingkat' => '4',
                'nama_kelas' => 'HIS404',
            ],
            [
                'jurusan' => 'Economics',
                'fakultas' => 'Faculty of Economics',
                'tingkat' => '1',
                'nama_kelas' => 'ECO101',
            ],
            [
                'jurusan' => 'Business Administration',
                'fakultas' => 'Faculty of Business Administration',
                'tingkat' => '2',
                'nama_kelas' => 'BADM202',
            ],
        ];

        foreach ($kelasData as $data) {
            Kelas::create($data);
        }
    }
}
