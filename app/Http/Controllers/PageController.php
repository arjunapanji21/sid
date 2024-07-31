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
        if(auth()->user()->role == "Admin"){
            $props = [
                'title' => 'Beranda',
                'jumlah_pengajuan' => count(PengajuanSurat::all()),
                'jumlah_warga' => count(DataWarga::all()),
                'pengajuan' => PengajuanSurat::orderBy('created_at', 'desc')->limit(5)->get(),
            ];
        }else{
            $props = [
                'title' => 'Beranda',
                'jumlah_pengajuan' => count(PengajuanSurat::all()),
                'jumlah_warga' => count(DataWarga::all()),
                'pengajuan' => PengajuanSurat::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->limit(5)->get(),
            ];
        }
        return view('beranda', $props);
    }
    public function buat_surat(){
        $props = [
            'title' => 'Pembuatan Surat',
        ];
        return view('buat_surat', $props);
    }
    public function pengajuan_surat(){
        if(auth()->user()->role == "Admin"){
            $props = [
                'title' => 'Pengajuan Surat',
                'pengajuan' => PengajuanSurat::orderBy('created_at', 'desc')->get(),
            ];
        }else{
            $props = [
                'title' => 'Pengajuan Surat',
                'pengajuan' => PengajuanSurat::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
            ];
        }
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

    public function pengajuan_surat_keterangan_kematian($id){
        $props = [
            'title' => 'Surat Keterangan Kematian',
            'pengajuan' => PengajuanSurat::find($id),
        ];
        return view('format_surat/surat_keterangan_kematian', $props);
    }
}
