<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index(){
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' .$row.' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' .$row.' baris'; 

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list'  => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        $kategori = KategoriModel::all(); //ambil data kategori untuk filter kategori

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

     // Ambil data kategori dalam bentuk json untuk datatables
     public function list()
     {
         $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');
 
         return DataTables::of($kategori)
             // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
             ->addIndexColumn()
             ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                 $btn = '<a href="'.url('/kategori/' . $kategori->id).'" class="btn btn-info btn-sm">Detail</a> ';
                 $btn .= '<a href="'.url('/kategori/' . $kategori->id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                 $btn .= '<form class="d-inline-block" method="POST" action="'.url('/kategori/' . $kategori->kategori_id).'">'
                     . csrf_field() . method_field('DELETE') .
                     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                 return $btn;
             })
             ->rawColumns(['aksi'])
             ->make(true);
     }
 
     // Menampilkan halaman form tambah kategori
     public function create()
     {
         $breadcrumb = (object) [
             'title' => 'Tambah Kategori',
             'list'  => ['Home', 'Kategori', 'Tambah']
         ];
 
         $page = (object) [
             'title' => 'Tambah Kategori baru'
         ];
 
         $kategori = KategoriModel::all(); // ambil data kategori untuk ditampilkan di form
         $activeMenu = 'kategori';       // set menu yang sedang aktif
 
         return view('kategori.create', [
             'breadcrumb' => $breadcrumb, 
             'page' => $page, 
             'kategori' => $kategori, 
             'activeMenu' => $activeMenu
         ]);
     }
 
     public function store(Request $request)
     {
         // Validasi input
         $request->validate([
             'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode', // kategori_id harus diisi, string, maksimal 10 karakter, dan unik di tabel m_kategori kolom kategori_kode
             'kategori_nama' => 'required|string|max:100'  // nama harus diisi, berupa string, dan maksimal 100 karakter
         ]);
 
         // Menyimpan data kategori baru
         KategoriModel::create([
             'kategori_kode' => $request->kategori_kode,
             'kategori_nama' => $request->kategori_nama
         ]);
 
         // Redirect ke halaman kategori dengan pesan sukses
         return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
     }
 
     // Menampilkan detail kategori
     public function show(string $id)
     {
         $kategori = KategoriModel::find($id);
 
         $breadcrumb = (object) [
             'title' => 'Detail Kategori',
             'list'  => ['Home', 'Kategori', 'Detail']
         ];
 
         $page = (object) [
             'title' => 'Detail Kategori'
         ];
 
         $activeMenu = 'kategori'; // set menu yang sedang aktif
 
         return view('kategori.show', [
             'breadcrumb' => $breadcrumb, 
             'page' => $page, 
             'kategori' => $kategori, 
             'activeMenu' => $activeMenu
         ]);
     }
 
     // Menampilkan halaman form edit kategori
     public function edit(string $id)
     {
         $kategori = KategoriModel::find($id); // Ambil data kategori yang akan diedit
 
         $breadcrumb = (object) [
             'title' => 'Edit Kategori',
             'list'  => ['Home', 'Kategori', 'Edit']
         ];
 
         $page = (object) [
             'title' => 'Edit Kategori'
         ];
 
         $activeMenu = 'kategori'; // set menu yang sedang aktif
 
         return view('kategori.edit', [
             'breadcrumb' => $breadcrumb,
             'page' => $page,
             'kategori' => $kategori,
             'activeMenu' => $activeMenu
         ]);
     }
 
     // Menyimpan perubahan data kategori
     public function update(Request $request, string $id)
     {
         $request->validate([
             'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,'.$id.',id', // kategori_id harus diisi, string, maksiumal 10 karakter, dan unik di tabel m_kategori kolom kategori_id
             'kategori_nama' => 'required|string|max:100'  // nama harus diisi, berupa string, dan maksimal 100 karakter
         ]);
 
         KategoriModel::find($id)->update([
             'kategori_kode' => $request->kategori_kode,
             'kategori_nama' => $request->kategori_nama
         ]);
 
         return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
     }
 
     // Menghapus data kategori
     public function destroy(string $id)
     {
         $check = KategoriModel::find($id);
         if (!$check) {    // untuk mengecek apakah data kategori dengan id yang dimaksud ada atau tidak
             return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
         }
 
         try{
             KategoriModel::destroy($id);    // Hapus data kategori
 
             return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
         }catch (\Illuminate\Database\QueryException $e){
             // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
             return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
         }
    }
}