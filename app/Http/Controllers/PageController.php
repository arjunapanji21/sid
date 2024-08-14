<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use App\Models\NewUser;
use App\Models\PengajuanSurat;
use App\Models\InformasiDesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function registrasi(){
        if(Auth::check()){
            return redirect()->route('beranda');
        }
        $props = [
            'title' => 'Registrasi',
        ];
        return view('registrasi', $props);
    }

    public function beranda(){
        if(auth()->user()->role == "Admin"){
            $props = [
                'title' => 'Beranda',
                'jumlah_pengajuan' => count(PengajuanSurat::all()),
                'jumlah_warga' => count(DataWarga::all()),
                'pengajuan' => PengajuanSurat::orderBy('created_at', 'desc')->limit(5)->get(),
                'new_user' => NewUser::where('konfirmasi', 'Pending')->orderBy('created_at', 'desc')->limit(5)->get(),
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
            'informasi' => InformasiDesa::latest()->get(),
        ];
        return view('informasi_desa', $props);
    }
    public function tambah_informasi_desa(){
        $props = [
            'title' => 'Tambah Informasi Desa',
        ];
        return view('tambah_informasi_desa', $props);
    }
    public function lihat_informasi_desa($id){
        $informasi = InformasiDesa::find($id);
        $informasi->jumlah_dilihat = $informasi->jumlah_dilihat + 1;
        $props = [
            'title' => 'Informasi Desa',
            'informasi' => $informasi,
        ];
        return view('lihat_informasi_desa', $props);
    }
    public function ubah_informasi_desa($id){
        $props = [
            'title' => 'Update Informasi Desa',
            'informasi' => InformasiDesa::find($id),
        ];
        return view('ubah_informasi_desa', $props);
    }
    public function submit_informasi_desa(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        InformasiDesa::create($data);
        return redirect(route('informasi_desa'))->with('success', 'Informasi Desa Berhasil Ditambah!');
    }
    public function update_informasi_desa($id, Request $request){
        $informasi = InformasiDesa::find($id);
        $informasi->judul = $request['judul'];
        $informasi->tanggal = $request['tanggal'];
        $informasi->konten = $request['konten'];
        $informasi->save();
        return redirect(route('informasi_desa'))->with('success', 'Informasi Desa Berhasil Diupdate!');
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
            'new_user' => NewUser::where('konfirmasi', 'Pending')->orderBy('created_at', 'desc')->get(),
        ];
        return view('data_pengguna', $props);
    }

    public function show_pengajuan_surat($id){
        $data = PengajuanSurat::find($id);
        if($data->jenis_surat == "Surat Keterangan Kematian"){
            $props = [
                'title' => $data->jenis_surat,
                'pengajuan' => $data,
            ];
            $pdf = Pdf::loadView('format_surat/surat_keterangan_kematian', $props);
            return $pdf->download(implode("_", explode("/", $data->no_surat)).'.pdf');
            // return view('format_surat/surat_keterangan_kematian', $props);
        }
        elseif($data->jenis_surat == "Surat Pengantar Nikah"){
            // dd(explode("#", $data->data));
            $props = [
                'title' => $data->jenis_surat,
                'pengajuan' => $data,
            ];
            $pdf = Pdf::loadView('format_surat/surat_pengantar_nikah', $props);
            return $pdf->download(implode("_", explode("/", $data->no_surat)).'.pdf');
            // return view('format_surat/surat_pengantar_nikah', $props);
        }
        elseif($data->jenis_surat == "Surat Keterangan Tidak Mampu"){
            // dd(explode("#", $data->data));
            $props = [
                'title' => $data->jenis_surat,
                'pengajuan' => $data,
            ];
            $pdf = Pdf::loadView('format_surat/surat_keterangan_tidak_mampu', $props);
            return $pdf->download(implode("_", explode("/", $data->no_surat)).'.pdf');
            // return view('format_surat/surat_keterangan_tidak_mampu', $props);
        }
        elseif($data->jenis_surat == "Surat Pengantar Pindah"){
            // dd(explode("#", $data->data));
            $props = [
                'title' => $data->jenis_surat,
                'pengajuan' => $data,
            ];
            $pdf = Pdf::loadView('format_surat/surat_pengantar_pindah', $props);
            return $pdf->download(implode("_", explode("/", $data->no_surat)).'.pdf');
            // return view('format_surat/surat_pengantar_pindah', $props);
        }
    }
}
