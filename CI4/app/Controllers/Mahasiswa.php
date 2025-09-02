<?php
namespace App\Controllers;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController {
    public function staticTable() {
        return view('mahasiswa_static');
    }

    public function loopTable()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll(); // ambil semua data dari tabel mahasiswa

        return view('mahasiswa_loop', $data);
    }
}