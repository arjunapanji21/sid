@extends('layout')

@section('content')
    <div class="w-full flex flex-col gap-4 justify-center max-w-screen-lg mx-auto bg-white p-14">
        <div class="mx-auto">
            <h1 class="font-bold text-sm uppercase underline underline-offset-4">{{$title}}</h1>
            <p class="text-sm uppercase">NO. </p>
        </div>
        <p class="text-sm">Yang bertanda tangan di bawah ini Kepala Desa Ngaol Ilir Kecamatan Tabir Barat Kabupaten Merangin menerangkan bahwa:</p>
        <table class="text-sm">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[1]}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[2]}}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl. Lahir</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[3].', '.date('d F Y', strtotime(explode("#", $pengajuan->data)[4]))}}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[5]}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[6]}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[7]}}</td>
            </tr>
        </table>
        <p class="text-sm">Adalah benar warga kami yang telah meninggal dunia pada tanggal {{date('d F Y', strtotime(explode("#", $pengajuan->data)[9]))}} di {{explode("#", $pengajuan->data)[8]}}.</p>
        <p class="text-sm">Demikian surat keterangan kematian ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>
        <br>
        <p class="text-sm text-right">Ngaol Ilir, {{date('d F Y', strtotime($pengajuan->updated_at))}}</p>
        <p class="text-sm text-right">Kepala Desa,</p>
        <br>
        <br>
        <p class="text-sm font-bold underline text-right">Syamsir Alam</p>
    </div>
@endsection

@section('script')
    <script>
        window.onload = function() { window.print(); }
    </script>
@endsection