<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use App\Models\PengajuanSurat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $props = [
            'title' => 'Sistem Informasi Desa Ngaol Ilir',
        ];
        return view('index', $props);
    }

    public function login(){
        if(Auth::check()){
            return redirect()->route('beranda');
        }
        $props = [
            'title' => 'Login',
        ];
        return view('login', $props);
    }

    public function beranda(){
        $props = [
            'title' => 'Beranda',
            'pengajuan' => PengajuanSurat::limit(5),
            'jumlah_pengajuan' => count(PengajuanSurat::all()),
            'jumlah_warga' => count(DataWarga::all()),
        ];
        return view('beranda', $props);
    }
    public function buat_surat(){
        $props = [
            'title' => 'Pembuatan Surat',
        ];
        return view('buat_surat', $props);
    }
    public function pengajuan_surat(){
        $props = [
            'title' => 'Pengajuan Surat',
        ];
        return view('pengajuan_surat', $props);
    }
    public function arsip(){
        $props = [
            'title' => 'Arsip Surat',
        ];
        return view('arsip', $props);
    }
    public function informasi_desa(){
        $props = [
            'title' => 'Informasi Desa',
        ];
        return view('informasi_desa', $props);
    }
    public function data_surat(){
        $props = [
            'title' => 'Data Surat',
        ];
        return view('data_surat', $props);
    }
    public function tambah_data_warga(){
        $props = [
            'title' => 'Input Data Warga',
        ];
        return view('tambah_data_warga', $props);
    }

    public function data_warga(){
        $props = [
            'title' => 'Data Warga',
            'warga' => DataWarga::orderBy('nama', 'asc')->get(),
        ];
        return view('data_warga', $props);
    }
    public function data_pengguna(){
        $props = [
            'title' => 'Data Pengguna',
            'pengguna' => User::orderBy('nama', 'asc')->get(),
        ];
        return view('data_pengguna', $props);
    }
}
