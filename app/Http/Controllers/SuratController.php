<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function simpan_pengajuan_surat(Request $request){
        $request->request->remove('_token');
        $nomor_surat = PengajuanSurat::where('jenis_surat', $request['jenis_surat'])->latest()->first();
        if($nomor_surat == null){
            if($request['jenis_surat'] == "Surat Keterangan Kematian"){
                $nomor_surat = "001/SKK/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Pengantar Nikah"){
                $nomor_surat = "001/SPN/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Keterangan Tidak Mampu"){
                $nomor_surat = "001/SKTM/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Pengantar Pindah"){
                $nomor_surat = "001/SPPD/DS-NGI/".date('Y');
            }
        }else{
            $nomor_terakhir = "00" . explode("/", $nomor_surat->no_surat)[0] + 1;
            if($request['jenis_surat'] == "Surat Keterangan Kematian"){
                $nomor_surat = substr($nomor_terakhir, -3, 3) . "/SKK/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Pengantar Nikah"){
                $nomor_surat = substr($nomor_terakhir, -3, 3) . "/SPN/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Keterangan Tidak Mampu"){
                $nomor_surat = substr($nomor_terakhir, -3, 3) . "/SKTM/DS-NGI/".date('Y');
            }
            elseif($request['jenis_surat'] == "Surat Pengantar Pindah"){
                $nomor_surat = substr($nomor_terakhir, -3, 3) . "/SPPD/DS-NGI/".date('Y');
            }
        }
        $data = implode("#", $request->all());
        PengajuanSurat::create([
            'user_id' => auth()->user()->id,
            'no_surat' => $nomor_surat,
            'jenis_surat' => $request['jenis_surat'],
            'status_pengajuan' => "Diproses",
            'data' => $data,
        ]);
        return redirect()->route('pengajuan_surat')->with('success', "Pengajuan surat berhasil di kirim!");
    }

    public function hapus_pengajuan_surat($id) {
        PengajuanSurat::find($id)->delete();
        return back()->with('success', 'Pengajuan Surat Berhasil Di Hapus!');
    }
}
