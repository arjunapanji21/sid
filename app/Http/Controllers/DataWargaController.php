<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use App\Models\NewUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataWargaController extends Controller
{
    public function upload_data_warga(Request $request){
        $request->validate([
            "nik" => "required|max:255|unique:data_wargas",
            "nama" => "required|max:255",
            "tempat_lahir" => "required|max:255",
            "tgl_lahir" => "required|max:255",
            "jk" => "required|max:255",
            "gol_darah" => "required|max:255",
            "alamat" => "required|max:255",
            "agama" => "required|max:255",
            "status" => "required|max:255",
            "pekerjaan" => "required|max:255",
            "kewarganegaraan" => "required|max:255",
            "password" => "required|confirmed",
        ]);
        $data = $request->all();
        NewUser::create($data);
        if(Auth::check()){
            return redirect()->route('data_warga')->with('success', "Data warga berhasil disimpan!");
        } else {
            return redirect()->route('login')->with('success', "Pembuatan akun berhasil!. Mohon tunggu beberapa saat sampai admin melakukan konfirmasi.");
        }
    }

    public function konfirmasi_pengguna_baru($id){
        $newUser = NewUser::find($id);
        $newUser->konfirmasi = "Confirmed";
        $newUser->save();
        $user_id = User::create([
            'nama' => $newUser->nama,
            'username' => $newUser->nik,
            'password' => bcrypt($newUser->password),
            'role' => "User",
        ])->id;
        $newUser->user_id = $user_id;
        DataWarga::create([
           'user_id' => $newUser->user_id,
           'nama' => $newUser->nama,
           'nik' => $newUser->nik,
           'tempat_lahir' => $newUser->tempat_lahir,
           'tgl_lahir' => $newUser->tgl_lahir,
           'jk' => $newUser->jk,
           'gol_darah' => $newUser->gol_darah,
           'alamat' => $newUser->alamat,
           'agama' => $newUser->agama,
           'status' => $newUser->status,
           'pekerjaan' => $newUser->pekerjaan,
           'kewarganegaraan' => $newUser->kewarganegaraan,
           'pasfoto' => $newUser->pasfoto,
           'ktp' => $newUser->ktp,
        ]);
        return redirect()->route('data_pengguna')->with('success', "Data pengguna berhasil dikonfirmasi!");
    }

    public function update_data_warga($id, Request $request){
        $request->validate([
            "nik" => "required|max:255",
            "nama" => "required|max:255",
            "tempat_lahir" => "required|max:255",
            "tgl_lahir" => "required|max:255",
            "jk" => "required|max:255",
            "gol_darah" => "required|max:255",
            "alamat" => "required|max:255",
            "agama" => "required|max:255",
            "status" => "required|max:255",
            "pekerjaan" => "required|max:255",
            "kewarganegaraan" => "required|max:255",
        ]);
        $data = $request->all();
        $warga = DataWarga::find($id);
        $warga->nik = $data['nik'];
        $warga->nama = $data['nama'];
        $warga->tempat_lahir = $data['tempat_lahir'];
        $warga->tgl_lahir = $data['tgl_lahir'];
        $warga->jk = $data['jk'];
        $warga->gol_darah = $data['gol_darah'];
        $warga->alamat = $data['alamat'];
        $warga->agama = $data['agama'];
        $warga->status = $data['status'];
        $warga->pekerjaan = $data['pekerjaan'];
        $warga->kewarganegaraan = $data['kewarganegaraan'];
        $pengguna = User::find($warga->user_id);
        $pengguna->nama = $data['nama'];
        $pengguna->save();
        $warga->save();
        
        return redirect()->route('data_warga')->with('success', "Data warga berhasil diperbarui!");
    }
    
    public function lihat_data_warga($id){
        $props = [
            'title' => 'Lihat Data Warga',
            'warga' => DataWarga::find($id)
        ];
        return view('lihat_data_warga', $props);
    }

    public function hapus_data_warga($id){
        $warga = DataWarga::find($id);
        $pengguna = User::find($warga->user_id);
        $warga->delete();
        $pengguna->delete();
        return redirect()->route('data_warga')->with('success', "Data warga berhasil dihapus!");
    }
}
