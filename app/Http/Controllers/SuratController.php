<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function surat_keterangan_kematian(Request $request){
        $request->request->remove('_token');
        $data = implode("#", $request->all());
        PengajuanSurat::create([
            'user_id' => auth()->user()->id,
            'jenis_surat' => $request['jenis_surat'],
            'status_pengajuan' => "Diproses",
            'data' => $data,
        ]);
        return redirect()->route('pengajuan_surat')->with('success', "Pengajuan surat berhasil di kirim!");
    }
}
