@extends('layout')

@section('content')
<section class="">
    <div class="">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{$title}}</h2>
        <form action="{{route('upload_data_warga')}}" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="NIK sesuai KTP" required="">
                </div>
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Warga</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Nama sesuai KTP" required="">
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tempat lahir sesuai KTP" required="">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tanggal lahir sesuai KTP" required="">
                </div>
                <div>
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="gol_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan
                        Darah</label>
                    <select id="gol_darah" name="gol_darah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih golongan darah:</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                        <option value="-">-</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Alamat sesuai KTP"></textarea>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div>
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih status:</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div>
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <select id="pekerjaan" name="pekerjaan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih pekerjaan:</option>
                        <option value="Belum / Tidak Bekerja">Belum / Tidak Bekerja</option>
                        <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                        <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                        <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                        <option value="Kepolisian RI">Kepolisian RI</option>
                        <option value="Perdagangan">Perdagangan</option>
                        <option value="Petani / Pekebun">Petani / Pekebun</option>
                        <option value="Peternak">Peternak</option>
                        <option value="Nelayan / Perikanan">Nelayan / Perikanan</option>
                        <option value="Industri">Industri</option>
                        <option value="Konstruksi">Konstruksi</option>
                        <option value="Transportasi">Transportasi</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Karyawan BUMN">Karyawan BUMN</option>
                        <option value="Karyawan BUMD">Karyawan BUMD</option>
                        <option value="Karyawan Honorer">Karyawan Honorer</option>
                        <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                        <option value="Buruh Tani / Perkebunan">Buruh Tani / Perkebunan</option>
                        <option value="Buruh Nelayan / Perikanan">Buruh Nelayan / Perikanan</option>
                        <option value="Buruh Peternakan">Buruh Peternakan</option>
                        <option value="Pembantu Rumah Tangga">Pembantu Rumah Tangga</option>
                        <option value="Tukang Cukur">Tukang Cukur</option>
                        <option value="Tukang Listrik">Tukang Listrik</option>
                        <option value="Tukang Batu">Tukang Batu</option>
                        <option value="Tukang Kayu">Tukang Kayu</option>
                        <option value="Tukang Sol Sepatu">Tukang Sol Sepatu</option>
                        <option value="Tukang Las / Pandai Besi">Tukang Las / Pandai Besi</option>
                        <option value="Tukang Jahit">Tukang Jahit</option>
                        <option value="Penata Rambut">Penata Rambut</option>
                        <option value="Penata Rias">Penata Rias</option>
                        <option value="Penata Busana">Penata Busana</option>
                        <option value="Mekanik">Mekanik</option>
                        <option value="Tukang Gigi">Tukang Gigi</option>
                        <option value="Seniman">Seniman</option>
                        <option value="Tabib">Tabib</option>
                        <option value="Paraji">Paraji</option>
                        <option value="Perancang Busana">Perancang Busana</option>
                        <option value="Penerjemah">Penerjemah</option>
                        <option value="Imam Masjid">Imam Masjid</option>
                        <option value="Pendeta">Pendeta</option>
                        <option value="Pastur">Pastur</option>
                        <option value="Wartawan">Wartawan</option>
                        <option value="Ustadz / Mubaligh">Ustadz / Mubaligh</option>
                        <option value="Juru Masak">Juru Masak</option>
                        <option value="Promotor Acara">Promotor Acara</option>
                        <option value="Anggota DPR-RI">Anggota DPR-RI</option>
                        <option value="Anggota DPD">Anggota DPD</option>
                        <option value="Anggota BPK">Anggota BPK</option>
                        <option value="Presiden">Presiden</option>
                        <option value="Wakil Presiden">Wakil Presiden</option>
                        <option value="Anggota Mahkamah Konstitusi">Anggota Mahkamah Konstitusi</option>
                        <option value="Anggota Kabinet / Kementerian">Anggota Kabinet / Kementerian</option>
                        <option value="Duta Besar">Duta Besar</option>
                        <option value="Gubernur">Gubernur</option>
                        <option value="Wakil Gubernur">Wakil Gubernur</option>
                        <option value="Bupati">Bupati</option>
                        <option value="Wakil Bupati">Wakil Bupati</option>
                        <option value="Walikota">Walikota</option>
                        <option value="Wakil Walikota">Wakil Walikota</option>
                        <option value="Anggota DPRD Provinsi">Anggota DPRD Provinsi</option>
                        <option value="Anggota DPRD Kabupaten">Anggota DPRD Kabupaten</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Guru">Guru</option>
                        <option value="Pilot">Pilot</option>
                        <option value="Pengacara">Pengacara</option>
                        <option value="Notaris">Notaris</option>
                        <option value="Arsitek">Arsitek</option>
                        <option value="Akuntan">Akuntan</option>
                        <option value="Konsultan">Konsultan</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Bidan">Bidan</option>
                        <option value="Perawat">Perawat</option>
                        <option value="Apoteker">Apoteker</option>
                        <option value="Psikiater / Psikolog">Psikiater / Psikolog</option>
                        <option value="Penyiar Televisi">Penyiar Televisi</option>
                        <option value="Penyiar Radio">Penyiar Radio</option>
                        <option value="Pelaut">Pelaut</option>
                        <option value="Peneliti">Peneliti</option>
                        <option value="Sopir">Sopir</option>
                        <option value="Pialang">Pialang</option>
                        <option value="Paranormal">Paranormal</option>
                        <option value="Pedagang">Pedagang</option>
                        <option value="Perangkat Desa">Perangkat Desa</option>
                        <option value="Kepala Desa">Kepala Desa</option>
                        <option value="Biarawati">Biarawati</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Anggota Lembaga Tinggi">Anggota Lembaga Tinggi</option>
                        <option value="Artis">Artis</option>
                        <option value="Atlit">Atlit</option>
                        <option value="Chef">Chef</option>
                        <option value="Manajer">Manajer</option>
                        <option value="Tenaga Tata Usaha">Tenaga Tata Usaha</option>
                        <option value="Operator">Operator</option>
                        <option value="Pekerja Pengolahan, Kerajinan">Pekerja Pengolahan, Kerajinan</option>
                        <option value="Teknisi">Teknisi</option>
                        <option value="Asisten Ahli">Asisten Ahli</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
                <!-- <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Pasfoto</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="pasfoto" name="pasfoto" type="file" accept="image/jpg, image/jpeg">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Format JPG/JPEG (ukuran Maks. 2MB)</p>
                </div>
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        KTP</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="ktp" name="ktp" type="file" accept="image/jpg, image/jpeg">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Format JPG/JPEG (ukuran Maks. 2MB)</p>
                </div> -->
            </div>
            <div class="grid gap-4 sm:gap-6 mt-8 pt-4 border-t-2 border-t-gray-300">
                {{-- <div class="w-full">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Email warga untuk masuk kedalam aplikasi" required="">
                </div> --}}
                <div class="w-full">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata
                        Sandi</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Kata sandi warga untuk masuk kedalam aplikasi" required="">
                </div>
                <div class="w-full">
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulangi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ketik ulang kata sandi" required="">
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                <a href="{{route('data_warga')}}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
                    Batalkan
                </a>
            </div>
        </form>
    </div>
</section>
@endsection