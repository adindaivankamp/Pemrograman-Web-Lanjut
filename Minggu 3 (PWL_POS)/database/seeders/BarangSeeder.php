<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'barang_kode' => 'TV001', 'barang_nama' => 'Televisi', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['kategori_id' => 1, 'barang_kode' => 'HP002', 'barang_nama' => 'Handphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['kategori_id' => 2, 'barang_kode' => 'KEM03', 'barang_nama' => 'Kemeja', 'harga_beli' => 80000, 'harga_jual' => 100000],
            ['kategori_id' => 2, 'barang_kode' => 'JKT04', 'barang_nama' => 'Jaket Jeans', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['kategori_id' => 3, 'barang_kode' => 'BRD05', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['kategori_id' => 3, 'barang_kode' => 'MSD06', 'barang_nama' => 'Mie Instan', 'harga_beli' => 2500, 'harga_jual' => 3500],
            ['kategori_id' => 4, 'barang_kode' => 'UHT07', 'barang_nama' => 'Susu UHT', 'harga_beli' => 5000, 'harga_jual' => 7500],
            ['kategori_id' => 4, 'barang_kode' => 'JUS08', 'barang_nama' => 'Jus Jeruk', 'harga_beli' => 5000, 'harga_jual' => 8000],
            ['kategori_id' => 5, 'barang_kode' => 'PUL09', 'barang_nama' => 'Pulpen', 'harga_beli' => 3000, 'harga_jual' => 4000],
            ['kategori_id' => 5, 'barang_kode' => 'PEN10', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 3000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
