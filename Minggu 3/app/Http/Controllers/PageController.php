<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'Nama : Adinda Ivanka Maysanda Putri || NIM : 2341760058';
    }

    public function articles($Id) {
        return 'Halaman artikel dengan ID : ' .$Id;
    }
}


