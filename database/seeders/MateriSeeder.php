<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materiData = [
            [
                'materi' => 'Introduction to Programming',
            ],
            [
                'materi' => 'Data Structures and Algorithms',
            ],
            [
                'materi' => 'Object-Oriented Programming',
            ],
            [
                'materi' => 'Database Management Systems',
            ],
        ];

        foreach ($materiData as $data) {
            Materi::create($data);
        }
    }
}
