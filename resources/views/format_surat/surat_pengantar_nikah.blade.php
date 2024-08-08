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
        <p>Yang bertanda tangan di bawah ini Kepala Desa Ngaol Ilir Kecamatan Tabir Barat Kabupaten Merangin menjelaskan dengan sesungguhnya bahwa:</p>
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
                <td>Alamat</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[9]}}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[10]}}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 14px; padding-bottom: 6px">
                    Adalah benar anak dari perkawinan seorang pria:
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[11]}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[12]}}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl. Lahir</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[13].', '.date('d-m-Y', strtotime(explode("#", $pengajuan->data)[14]))}}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[15]}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[16]}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[17]}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[18]}}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 14px; padding-bottom: 6px">
                    Dengan seorang perempuan:
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[19]}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[20]}}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl. Lahir</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[21].', '.date('d-m-Y', strtotime(explode("#", $pengajuan->data)[22]))}}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[23]}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[24]}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[25]}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[26]}}</td>
            </tr>
        </table>
        <p>Demikian surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
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