<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin: auto;">
    <div style="text-align: center; line-height: 25%;">
        <h3 style="text-decoration: underline;text-transform: uppercase">{{$title}}</h3>
        <p>Nomor: {{$pengajuan->no_surat}}</p>
    </div>
    <br>
    <div style="text-align: justify">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Ngaol Ilir Kecamatan Tabir Barat Kabupaten Merangin menerangkan dengan sebenarnya bahwa:</p>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[1]}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[2]}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[3]}}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl. Lahir</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[4].', '.date('d-m-Y', strtotime(explode("#", $pengajuan->data)[5]))}}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[6]}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[7]}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[8]}}</td>
            </tr>
            <tr>
                <td>Alamat Asal</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[9]}}</td>
            </tr>
            <tr>
                <td>Alamat Tujuan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[10]}}</td>
            </tr>
            <tr>
                <td>Alasan Pindah</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[11]}}</td>
            </tr>
        </table>
        <table style="margin-top: 5px; width: 100%;border: 1px solid black;">
            <tr>
                <td colspan="4">Pengikut / Keluarga Yang Pindah</td>
            </tr>
            <tr style="border: 1px solid black; text-align: center">
                <th style="border: 1px solid black;">NO</th>
                <th style="border: 1px solid black;">NIK</th>
                <th style="border: 1px solid black;">NAMA LENGKAP</th>
                <th style="border: 1px solid black;">SHDK</th>
            </tr>
            @foreach(explode(";", explode("#", $pengajuan->data)[12]) as $row)
            <tr style="border: 1px solid black; text-align: center">
                <td style="border: 1px solid black;">{{$loop->iteration}}</td>
                <td style="border: 1px solid black;">{{explode("_", $row)[0]}}</td>
                <td style="border: 1px solid black;">{{explode("_", $row)[1]}}</td>
                <td style="border: 1px solid black;">{{explode("_", $row)[2]}}</td>
            </tr>
            @endforeach
        </table>
        
        <p>Demikian surat pengantar pindah ini dibuat dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p>
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