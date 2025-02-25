<?php

namespace App\Http\Controllers;

use App\Models\Item; //mengimpor model Item yang kemungkinan besar digunakan untuk berinteraksi dengan database untuk data "item".
use Illuminate\Http\Request; //mengimpor kelas Request yang digunakan untuk mengambil data dari request HTTP.

class ItemController extends Controller
{
    /*** Display a listing of the resource.*/
    public function index() //method untuk menampilkan daftar semua item.
    {
        $items = Item::all(); //untuk mengambil semua data "item" dari database menggunakan model Item.
        return view('items.index', compact('items')); //mengembalikan view bernama items.index dan mengirimkan data $items ke view tersebut.
    }

    /*** Show the form for creating a new resource.*/
    public function create() //method untuk menampilkan form untuk membuat "item" baru.
    {
        return view('items.create'); //mengembalikan view bernama items.create yang berisi form untuk membuat "item" baru.
    }

    /*** Store a newly created resource in storage.*/
    public function store(Request $request) //method untuk menyimpan data "item" yang baru dibuat ke database.
    {
        $request->validate([ //memvalidasi data yang dikirimkan melalui request.
            'name' => 'required',
            'description' => 'required'
        ]); //membuat "item" baru di database hanya dengan menggunakan atribut name dan description dari request.

        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));

        return redirect()->route('items.index')->with('success', 'Item added successfully.'); //mengalihkan pengguna kembali ke halaman daftar "item" dan menampilkan pesan sukses.
    }

    /*** Display the specified resource.*/
    public function show(Item $item) //digunakan untuk menampilkan detail sebuah "item".
    {
        return view('items.show', compact('item')); //Mengembalikan view items.show dan mengirimkan data $item ke view tersebut.
    }

    /*** Show the form for editing the specified resource.*/
    public function edit(Item $item) //Method ini digunakan untuk menampilkan form untuk mengedit "item".
    {
        return view('items.edit', compact('item')); //Mengembalikan view items.edit dan mengirimkan data $item ke view tersebut.
    }

    /*** Update the specified resource in storage.*/
    public function update(Request $request, Item $item) //ethod ini digunakan untuk mengupdate data "item" di database.
    {
        $request->validate([ //Memvalidasi data yang dikirimkan melalui request.
            'name' => 'required',
            'description' => 'required',
        ]);//Mengupdate data "item" di database hanya dengan atribut name dan description dari request.

        //$item->update($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description']));

        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); //Mengalihkan pengguna kembali ke halaman daftar "item" dan menampilkan pesan sukses.
    }

    /*** Remove the specified resource from storage.*/
    public function destroy(Item $item) //Method ini digunakan untuk menghapus "item" dari database.
    {
        $item->delete(); //Menghapus "item" dari database.
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); //Mengalihkan pengguna kembali ke halaman daftar "item" dan menampilkan pesan sukses.
    }
}
