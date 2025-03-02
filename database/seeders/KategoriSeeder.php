<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'EL', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'PK', 'kategori_nama' => 'Pakaian'],
            ['kategori_kode' => 'MK', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'MI', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'ATK', 'kategori_nama' => 'Alat Tulis Kantor'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
