<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin: auto;">
    <br>
    <br>
    <br>
    <div style="text-align: center; line-height: 25%;">
        <h3 style="text-decoration: underline">{{$title}}</h3>
        <p>NO. {{$pengajuan->no_surat}}</p>
    </div>
    <br>
    <div style="text-align: justify">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Ngaol Ilir Kecamatan Tabir Barat Kabupaten Merangin menerangkan bahwa:</p>
        <table style="margin: auto; width: 90%">
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
        <p>Adalah benar warga kami yang telah meninggal dunia pada tanggal {{date('d F Y', strtotime(explode("#", $pengajuan->data)[9]))}} di {{explode("#", $pengajuan->data)[8]}}.</p>
        <p>Demikian surat keterangan kematian ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>
        <br>
        <div style="width: 30%; margin-left: auto">
            <p>Ngaol Ilir, {{date('d-m-Y', strtotime($pengajuan->updated_at))}}</p>
            <p>Kepala Desa,</p>
            <br>
            <br>
            <p>Syamsir Alam</p>
        </div>
    </div>
</body>
</html>