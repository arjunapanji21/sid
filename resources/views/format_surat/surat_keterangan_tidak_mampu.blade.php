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
                <td>Alamat</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[8]}}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 14px; padding-bottom: 6px">
                    Adalah benar anak dari:
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[9]}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[10]}}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl. Lahir</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[11].', '.date('d-m-Y', strtotime(explode("#", $pengajuan->data)[12]))}}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[13]}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[14]}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[15]}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{explode("#", $pengajuan->data)[16]}}</td>
            </tr>
        </table>
        <p>Merupakan penduduk Desa Ngaol Ilir yang berstatus ekonomi kurang mampu. Surat keterangan ini dibuat berdasarkan data dan kenyataan yang ada, serta untuk digunakan sebagai persyaratan {{explode("#", $pengajuan->data)[17]}}.</p>
        <p>Demikian surat keterangan ini dibuat agar dapat digunakan sebagaimana mestinya.</p>
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