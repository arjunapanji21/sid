<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use App\Models\User;
use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    public function upload_data_warga(Request $request){
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
            "email" => "required|email|max:255|unique:users",
            "password" => "required|confirmed",
        ]);
        $data = $request->all();
        $user_id = User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => "User",
        ])->id;
        $data['user_id'] = $user_id;
        DataWarga::create($data);
        return redirect()->route('data_warga')->with('success', "Data warga berhasil disimpan!");
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
}
