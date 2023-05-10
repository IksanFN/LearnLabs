<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create(
        [
            'nisn' => '192010213',
            'nama' => 'Iksan Fauzi Nugraha',
            'no_hp' => '083822658034',
            'alamat' => 'Cipatat'
        ],
        [
            'nisn' => '192010214',
            'nama' => 'Jia Nuraya Fauziah',
            'no_hp' => '083822658034',
            'alamat' => 'Cipatat'
        ]
        
        );
    }
}
