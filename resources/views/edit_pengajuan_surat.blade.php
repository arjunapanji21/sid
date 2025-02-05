@extends('layout')

@section('content')

<section class="">
    <div class="">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Pembuatan Surat</h2>
        <div class="grid sm:grid-cols-2 gap-4 mb-5">
            <div class="w-full">
                <label for="pilih_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Surat</label>
                <select disabled id="pilih_surat" onchange="showInputForm()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected disabled>Pilih jenis surat:</option>
                    <option @if($pengajuan->jenis_surat == "Surat Keterangan Kematian" ) selected @endif value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                    <option @if($pengajuan->jenis_surat == "Surat Pengantar Nikah" ) selected @endif value="Surat Pengantar Nikah">Surat Pengantar Nikah</option>
                    <option @if($pengajuan->jenis_surat == "Surat Keterangan Tidak Mampu" ) selected @endif value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                    <option @if($pengajuan->jenis_surat == "Surat Pengantar Pindah" ) selected @endif value="Surat Pengantar Pindah">Surat Pengantar Pindah</option>
                </select>
            </div>
            <div class="w-full">
                <label for="diajukan_oleh" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diajukan Oleh</label>
                <input disabled type="text" id="diajukan_oleh"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    value="{{$pengajuan->user->nama}}" placeholder="Diajukan oleh">
            </div>
        </div>
        @if($pengajuan->jenis_surat == "Surat Keterangan Kematian")
        <form id="surat-keterangan-kematian" action="{{route('update_pengajuan_surat', $pengajuan->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full hidden">
                <input type="text" name="jenis_surat" id="jenis_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    value="Surat Keterangan Kematian">
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Surat Keterangan Kematian</h3>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama_lengkap_alias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap dan Alias</label>
                    <input type="text" name="nama_lengkap_alias" id="nama_lengkap_alias"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[1]}}" placeholder="Nama lengkap dan alias alm/h" required="">
                </div>
                <div class="w-full">
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option @if(explode('#', $pengajuan->data)[2] == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                        <option @if(explode('#', $pengajuan->data)[2] == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[3]}}" placeholder="Tempat lahir alm/h" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[4]}}" placeholder="Tanggal lahir sesuai KTP" required="">
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[5] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[5] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[7]}}" placeholder="Pekerjaan alm/h" required="">
                </div>
                <div class="w-full">
                    <label for="tempat_wafat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Wafat</label>
                    <input type="text" name="tempat_wafat" id="tempat_wafat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[8]}}" placeholder="Tempat wafat alm/h" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_wafat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl. Wafat</label>
                    <input type="date" name="tgl_wafat" id="tgl_wafat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[9]}}" placeholder="Tanggal wafat alm/h" required="">
                </div>
                <div class="w-full">
                    <label for="nama_orangtua"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua Kandung</label>
                    <input type="text" name="nama_orangtua" id="nama_orangtua"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[10]}}" placeholder="Nama orang tua alm/h" required="">
                </div>
                <div class="w-full col-span-2 border-t mt-2 pt-2 "></div>
                <div class="">
                    <label for="status_pengajuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pengajuan</label>
                    <select id="status_pengajuan" name="status_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih status pengajuan:</option>
                        <option @if($pengajuan->status_pengajuan == "Dalam Antrean") selected @endif value="Dalam Antrean">Dalam Antrean</option>
                        <option @if($pengajuan->status_pengajuan == "Sedang Diproses") selected @endif value="Sedang Diproses">Sedang Diproses</option>
                        <option @if($pengajuan->status_pengajuan == "Selesai") selected @endif value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Surat Yang Sudah Di Tanda Tangan</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" id="file" type="file">
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                <a href="{{route('pengajuan_surat')}}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
                    Batalkan
                </a>
            </div>
        </form>
        @elseif($pengajuan->jenis_surat == "Surat Pengantar Nikah")
        <form id="surat-pengantar-nikah" action="{{route('update_pengajuan_surat', $pengajuan->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full hidden">
                <input type="text" name="jenis_surat" id="jenis_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    value="Surat Pengantar Nikah">
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Surat Pengantar Nikah</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[1]}}" placeholder="Nama calon pengantin" required="">
                </div>
                <div class="w-full">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[2]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[4]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[5]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[8]}}" placeholder="Pekerjaan" required="">
                </div>
                <div class="w-full">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[9]}}" placeholder="Alamat sesuai KTP" required="">
                </div>
                <div>
                    <label for="status_perkawinan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                    <select id="status_perkawinan" name="status_perkawinan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih status:</option>
                        <option @if(explode('#', $pengajuan->data)[10] == "Belum Kawin") selected @endif value="Belum Kawin">Belum Kawin</option>
                        <option @if(explode('#', $pengajuan->data)[10] == "Kawin") selected @endif value="Kawin">Kawin</option>
                        <option @if(explode('#', $pengajuan->data)[10] == "Cerai Hidup") selected @endif value="Cerai Hidup">Cerai Hidup</option>
                        <option @if(explode('#', $pengajuan->data)[10] == "Cerai Mati") selected @endif value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Data Ayah Kandung</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[11]}}" placeholder="Nama Ayah Kandung" required="">
                </div>
                <div class="w-full">
                    <label for="nik_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK Ayah</label>
                    <input type="number" name="nik_ayah" id="nik_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[12]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="tempat_lahir_ayah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[13]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir_ayah" id="tgl_lahir_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[14]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan_ayah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan_ayah" name="kewarganegaraan_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[15] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[15] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama_ayah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama_ayah" name="agama_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[16] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan_ayah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[17]}}" placeholder="Pekerjaan" required="">
                </div>
                <div class="w-full">
                    <label for="alamat_ayah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat_ayah" id="alamat_ayah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[18]}}" placeholder="Alamat sesuai KTP" required="">
                </div>
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Data Ibu Kandung</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[19]}}" placeholder="Nama ibu Kandung" required="">
                </div>
                <div class="w-full">
                    <label for="nik_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik_ibu" id="nik_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[20]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="tempat_lahir_ibu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[21]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir_ibu" id="tgl_lahir_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[22]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan_ibu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan_ibu" name="kewarganegaraan_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[23] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[23] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama_ibu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama_ibu" name="agama_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[24] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan_ibu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[25]}}" placeholder="Pekerjaan" required="">
                </div>
                <div class="w-full">
                    <label for="alamat_ibu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat_ibu" id="alamat_ibu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[26]}}" placeholder="Alamat sesuai KTP" required="">
                </div>
                <div class="w-full col-span-2 border-t mt-2 pt-2 "></div>
                <div class="">
                    <label for="status_pengajuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pengajuan</label>
                    <select id="status_pengajuan" name="status_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih status pengajuan:</option>
                        <option @if($pengajuan->status_pengajuan == "Dalam Antrean") selected @endif value="Dalam Antrean">Dalam Antrean</option>
                        <option @if($pengajuan->status_pengajuan == "Sedang Diproses") selected @endif value="Sedang Diproses">Sedang Diproses</option>
                        <option @if($pengajuan->status_pengajuan == "Selesai") selected @endif value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Surat Yang Sudah Di Tanda Tangan</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" id="file" type="file">
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                <a href="{{route('pengajuan_surat')}}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
                    Batalkan
                </a>
            </div>
        </form>
        @elseif($pengajuan->jenis_surat == "Surat Keterangan Tidak Mampu")
        <form id="surat-keterangan-tidak-mampu" action="{{route('update_pengajuan_surat', $pengajuan->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full hidden">
                <input type="text" name="jenis_surat" id="jenis_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    value="Surat Keterangan Tidak Mampu">
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Surat Keterangan Tidak Mampu</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[1]}}" placeholder="Nama pemohon" required="">
                </div>
                <div class="w-full">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[2]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[4]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[5]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[8]}}" placeholder="Alamat sesuai KTP" required="">
                </div>
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Data Orang Tua/Wali</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua/Wali</label>
                    <input type="text" name="nama_wali" id="nama_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[9]}}" placeholder="Nama Ayah Kandung" required="">
                </div>
                <div class="w-full">
                    <label for="nik_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK Orang Tua/Wali</label>
                    <input type="number" name="nik_wali" id="nik_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[10]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="tempat_lahir_wali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[11]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir_wali" id="tgl_lahir_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[12]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan_wali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan_wali" name="kewarganegaraan_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[13] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[13] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama_wali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama_wali" name="agama_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[14] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan_wali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan_wali" id="pekerjaan_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[15]}}" placeholder="Pekerjaan" required="">
                </div>
                <div class="w-full">
                    <label for="alamat_wali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="alamat_wali" id="alamat_wali"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[16]}}" placeholder="Alamat sesuai KTP" required="">
                </div>
                <div class="w-full">
                    <label for="keperluan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan SKTM</label>
                    <input type="text" name="keperluan" id="keperluan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[17]}}" placeholder="misalnya: mengajukan beasiswa, bantuan sosial, dll." required="">
                </div>
                <div class="w-full col-span-2 border-t mt-2 pt-2 "></div>
                <div class="">
                    <label for="status_pengajuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pengajuan</label>
                    <select id="status_pengajuan" name="status_pengajuan" name="status_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih status pengajuan:</option>
                        <option @if($pengajuan->status_pengajuan == "Dalam Antrean") selected @endif value="Dalam Antrean">Dalam Antrean</option>
                        <option @if($pengajuan->status_pengajuan == "Sedang Diproses") selected @endif value="Sedang Diproses">Sedang Diproses</option>
                        <option @if($pengajuan->status_pengajuan == "Selesai") selected @endif value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Surat Yang Sudah Di Tanda Tangan</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" id="file" type="file">
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                <a href="{{route('pengajuan_surat')}}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
                    Batalkan
                </a>
            </div>
        </form>
        @elseif($pengajuan->jenis_surat == "Surat Pengantar Pindah")
        <form id="surat-pengantar-pindah" action="{{route('update_pengajuan_surat', $pengajuan->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full hidden">
                <input type="text" name="jenis_surat" id="jenis_surat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    value="Surat Pengantar Pindah">
            </div>
            <h3 class="font-bold py-4 border-t border-t-gray-300">Surat Pengantar Pindah</h3>
            <div class="grid mb-4 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[1]}}" placeholder="Nama pemohon" required="">
                </div>
                <div class="w-full">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[2]}}" placeholder="Nomor Induk Kependudukan" required="">
                </div>
                <div class="w-full">
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                        <option @if(explode('#', $pengajuan->data)[3] == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[4]}}" placeholder="Tempat lahir" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[5]}}" placeholder="Tanggal lahir" required="">
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if(explode('#', $pengajuan->data)[6] == "WNA") selected @endif value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if(explode('#', $pengajuan->data)[7] == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[8]}}" placeholder="Pekerjaan" required="">
                </div>
                <div class="w-full">
                    <label for="alamat_asal"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Asal</label>
                    <input type="text" name="alamat_asal" id="alamat_asal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[9]}}" placeholder="Alamat asal" required="">
                </div>
                <div class="w-full">
                    <label for="alamat_tujuan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Tujuan</label>
                    <input type="text" name="alamat_tujuan" id="alamat_tujuan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{explode('#', $pengajuan->data)[10]}}" placeholder="Alamat tujuan" required="">
                </div>
                <div class="w-full">
                    <label for="alasan_pindah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan Pindah</label>
                    <input type="text" name="alasan_pindah" id="alasan_pindah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Alasan pindah" value="{{explode('#', $pengajuan->data)[11]}}" required="">
                </div>
                <div class="w-full">
                    <label for="pengikut"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengikut / Keluarga Yang Pindah</label>
                    <input type="text" name="pengikut" id="pengikut"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="NIK_NAMA LENGKAP_SHDK;NIK_NAMA LENGKAP_SHDK" required="" value="{{explode('#', $pengajuan->data)[12]}}">
                    <label
                        class="block mb-2 italic text-gray-600 text-xs font-medium ">*) Pisahkan dengan simbol ; (titik koma) bila lebih dari satu</label>
                </div>
                <div class="w-full col-span-2 border-t mt-2 pt-2 "></div>
                <div class="">
                    <label for="status_pengajuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pengajuan</label>
                    <select id="status_pengajuan" name="status_pengajuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih status pengajuan:</option>
                        <option @if($pengajuan->status_pengajuan == "Dalam Antrean") selected @endif value="Dalam Antrean">Dalam Antrean</option>
                        <option @if($pengajuan->status_pengajuan == "Sedang Diproses") selected @endif value="Sedang Diproses">Sedang Diproses</option>
                        <option @if($pengajuan->status_pengajuan == "Selesai") selected @endif value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Surat Yang Sudah Di Tanda Tangan</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" id="file" type="file">
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                <a href="{{route('pengajuan_surat')}}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
                    Batalkan
                </a>
            </div>
        </form>
        @endif
    </div>
</section>
@endsection

@section('script')
<script>
    function showInputForm(){
        var pilihan = document.getElementById('pilih_surat').value;
        if(pilihan == "Surat Keterangan Kematian"){
            document.getElementById('surat-keterangan-kematian').classList.remove("hidden");
            document.getElementById('surat-pengantar-nikah').classList.add("hidden");
            document.getElementById('surat-keterangan-tidak-mampu').classList.add("hidden");
            document.getElementById('surat-pengantar-pindah').classList.add("hidden");
        }
        else if(pilihan == "Surat Pengantar Nikah"){
            document.getElementById('surat-keterangan-kematian').classList.add("hidden");
            document.getElementById('surat-pengantar-nikah').classList.remove("hidden");
            document.getElementById('surat-keterangan-tidak-mampu').classList.add("hidden");
            document.getElementById('surat-pengantar-pindah').classList.add("hidden");
        }
        else if(pilihan == "Surat Keterangan Tidak Mampu"){
            document.getElementById('surat-keterangan-kematian').classList.add("hidden");
            document.getElementById('surat-pengantar-nikah').classList.add("hidden");
            document.getElementById('surat-keterangan-tidak-mampu').classList.remove("hidden");
            document.getElementById('surat-pengantar-pindah').classList.add("hidden");
        }
        else if(pilihan == "Surat Pengantar Pindah"){
            document.getElementById('surat-keterangan-kematian').classList.add("hidden");
            document.getElementById('surat-pengantar-nikah').classList.add("hidden");
            document.getElementById('surat-keterangan-tidak-mampu').classList.add("hidden");
            document.getElementById('surat-pengantar-pindah').classList.remove("hidden");
        }
    }
</script>
@endsection