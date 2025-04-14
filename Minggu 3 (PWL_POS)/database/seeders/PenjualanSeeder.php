<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan foreign key constraint sementara
        // DB::statement("SET FOREIGN_KEY_CHECKS=0;");

        // Kosongkan tabel tanpa error foreign key
        // DB::table('t_penjualan_detail')->truncate();
        // DB::table('t_penjualan')->truncate();
        $data = [
            ['user_id' => 3, 'pembeli' => 'Adinda', 'penjual_kode' => 'P001', 'penjualan_tanggal' => Carbon::now()],
            ['user_id' => 3, 'pembeli' => 'Farel', 'penjual_kode' => 'P002', 'penjualan_tanggal' => Carbon::now()->subDay()],
            ['user_id' => 3, 'pembeli' => 'Shaquil', 'penjual_kode' => 'P003', 'penjualan_tanggal' => Carbon::now()->subDays(2)],
            ['user_id' => 3, 'pembeli' => 'Dina', 'penjual_kode' => 'P004', 'penjualan_tanggal' => Carbon::now()->subDays(3)],
            ['user_id' => 3, 'pembeli' => 'Aida', 'penjual_kode' => 'P005', 'penjualan_tanggal' => Carbon::now()->subDays(4)],
            ['user_id' => 3, 'pembeli' => 'Dela', 'penjual_kode' => 'P006', 'penjualan_tanggal' => Carbon::now()->subDays(5)],
            ['user_id' => 3, 'pembeli' => 'Rani', 'penjual_kode' => 'P007', 'penjualan_tanggal' => Carbon::now()->subDays(6)],
            ['user_id' => 3, 'pembeli' => 'Yuta', 'penjual_kode' => 'P008', 'penjualan_tanggal' => Carbon::now()->subDays(7)],
            ['user_id' => 3, 'pembeli' => 'Niriza', 'penjual_kode' => 'P009', 'penjualan_tanggal' => Carbon::now()->subDays(8)],
            ['user_id' => 3, 'pembeli' => 'Danen', 'penjual_kode' => 'P010', 'penjualan_tanggal' => Carbon::now()->subDays(9)],
        ];

        DB::table('t_penjualan')->insert($data);
        // Nyalakan kembali foreign key constraint
        // DB::statement("SET FOREIGN_KEY_CHECKS=1;");
    }
}
