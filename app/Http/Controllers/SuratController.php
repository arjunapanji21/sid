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
            'status_pengajuan' => "Dalam Antrean",
            'tgl_pengajuan' => date(now()),
            'data' => $data,
        ]);
        return redirect()->route('pengajuan_surat')->with('success', "Pengajuan surat berhasil di kirim!");
    }

    public function update_pengajuan_surat(Request $request, $id){
        $pengajuan = PengajuanSurat::find($id);
        $status = $request['status_pengajuan'];
        $file = null;
        if(!is_null($request['file'])){
            $file = $request->file('file');
            $extension = $file->extension();
            $folder = public_path('uploads/surat/');
            $filename = $pengajuan->id . "_" . str_replace("/","_", $pengajuan->no_surat) . "." . $extension;
            $file->move($folder, $filename);
            $status = "Selesai";
            $pengajuan->tgl_selesai = date(now());
        }
        $request->request->remove('_token','status_pengajuan', 'file');
        $data = implode("#", $request->all());
        $pengajuan->status_pengajuan = $status;
        $pengajuan->data = $data;
        $pengajuan->file = $filename;
        $pengajuan->save();
        return redirect()->route('pengajuan_surat')->with('success', "Pengajuan surat berhasil di update!");
    }

    public function hapus_pengajuan_surat($id) {
        PengajuanSurat::find($id)->delete();
        return back()->with('success', 'Pengajuan Surat Berhasil Di Hapus!');
    }
}
