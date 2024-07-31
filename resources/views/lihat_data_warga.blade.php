@extends('layout')

@section('content')
<section class="">
    <div class="">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{$title}}</h2>
        <form action="{{route('update_data_warga', $warga->id)}}" method="post">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="">
                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="NIK sesuai KTP" required="" value="{{$warga->nik}}">
                </div>
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Warga</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Nama sesuai KTP" required="" value="{{$warga->nama}}">
                </div>
                <div class="w-full">
                    <label for="tempat_lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tempat lahir sesuai KTP" required="" value="{{$warga->tempat_lahir}}">
                </div>
                <div class="w-full">
                    <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Tanggal lahir sesuai KTP" required="" value="{{$warga->tgl_lahir}}">
                </div>
                <div>
                    <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jk" name="jk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih jenis kelamin:</option>
                        <option @if($warga->jk == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                        <option  @if($warga->jk == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="gol_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan
                        Darah</label>
                    <select id="gol_darah" name="gol_darah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih golongan darah:</option>
                        <option @if($warga->gol_darah == "A") selected @endif value="A">A</option>
                        <option @if($warga->gol_darah == "B") selected @endif value="B">B</option>
                        <option @if($warga->gol_darah == "AB") selected @endif value="AB">AB</option>
                        <option @if($warga->gol_darah == "O") selected @endif value="O">O</option>
                        <option @if($warga->gol_darah == "-") selected @endif value="-">-</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Alamat sesuai KTP">{{$warga->alamat}}</textarea>
                </div>
                <div>
                    <label for="agama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="agama" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih agama:</option>
                        <option @if($warga->agama == "Islam") selected @endif value="Islam">Islam</option>
                        <option @if($warga->agama == "Kristen") selected @endif value="Kristen">Kristen</option>
                        <option @if($warga->agama == "Katolik") selected @endif value="Katolik">Katolik</option>
                        <option @if($warga->agama == "Hindu") selected @endif value="Hindu">Hindu</option>
                        <option @if($warga->agama == "Buddha") selected @endif value="Buddha">Buddha</option>
                        <option @if($warga->agama == "Khonghucu") selected @endif value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div>
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih status:</option>
                        <option @if($warga->status == "Belum Kawin") selected @endif value="Belum Kawin">Belum Kawin</option>
                        <option @if($warga->status == "Kawin") selected @endif value="Kawin">Kawin</option>
                        <option @if($warga->status == "Cerai Hidup") selected @endif value="Cerai Hidup">Cerai Hidup</option>
                        <option @if($warga->status == "Cerai Mati") selected @endif value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div>
                    <label for="pekerjaan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <select id="pekerjaan" name="pekerjaan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih pekerjaan:</option>
                        <option value="Belum / Tidak Bekerja" @if($warga->pekerjaan == "Belum / Tidak Bekerja") selected @endif>Belum / Tidak Bekerja</option>
                        <option value="Mengurus Rumah Tangga" @if($warga->pekerjaan == "Mengurus Rumah Tangga") selected @endif>Mengurus Rumah Tangga</option>
                        <option value="Pelajar / Mahasiswa" @if($warga->pekerjaan == "Pelajar / Mahasiswa") selected @endif>Pelajar / Mahasiswa</option>
                        <option value="Pensiunan" @if($warga->pekerjaan == "Pensiunan") selected @endif>Pensiunan</option>
                        <option value="Pegawai Negeri Sipil" @if($warga->pekerjaan == "Pegawai Negeri Sipil") selected @endif>Pegawai Negeri Sipil</option>
                        <option value="Tentara Nasional Indonesia" @if($warga->pekerjaan == "Tentara Nasional Indonesia") selected @endif>Tentara Nasional Indonesia</option>
                        <option value="Kepolisian RI" @if($warga->pekerjaan == "Kepolisian RI") selected @endif>Kepolisian RI</option>
                        <option value="Perdagangan" @if($warga->pekerjaan == "Perdagangan") selected @endif>Perdagangan</option>
                        <option value="Petani / Pekebun" @if($warga->pekerjaan == "Petani / Pekebun") selected @endif>Petani / Pekebun</option>
                        <option value="Peternak" @if($warga->pekerjaan == "Peternak") selected @endif>Peternak</option>
                        <option value="Nelayan / Perikanan" @if($warga->pekerjaan == "Nelayan / Perikanan") selected @endif>Nelayan / Perikanan</option>
                        <option value="Industri" @if($warga->pekerjaan == "Industri") selected @endif>Industri</option>
                        <option value="Konstruksi" @if($warga->pekerjaan == "Konstruksi") selected @endif>Konstruksi</option>
                        <option value="Transportasi" @if($warga->pekerjaan == "Transportasi") selected @endif>Transportasi</option>
                        <option value="Karyawan Swasta" @if($warga->pekerjaan == "Karyawan Swasta") selected @endif>Karyawan Swasta</option>
                        <option value="Karyawan BUMN" @if($warga->pekerjaan == "Karyawan BUMN") selected @endif>Karyawan BUMN</option>
                        <option value="Karyawan BUMD" @if($warga->pekerjaan == "Karyawan BUMD") selected @endif>Karyawan BUMD</option>
                        <option value="Karyawan Honorer" @if($warga->pekerjaan == "Karyawan Honorer") selected @endif>Karyawan Honorer</option>
                        <option value="Buruh Harian Lepas" @if($warga->pekerjaan == "Buruh Harian Lepas") selected @endif>Buruh Harian Lepas</option>
                        <option value="Buruh Tani / Perkebunan" @if($warga->pekerjaan == "Buruh Tani / Perkebunan") selected @endif>Buruh Tani / Perkebunan</option>
                        <option value="Buruh Nelayan / Perikanan" @if($warga->pekerjaan == "Buruh Nelayan / Perikanan") selected @endif>Buruh Nelayan / Perikanan</option>
                        <option value="Buruh Peternakan" @if($warga->pekerjaan == "Buruh Peternakan") selected @endif>Buruh Peternakan</option>
                        <option value="Pembantu Rumah Tangga" @if($warga->pekerjaan == "Pembantu Rumah Tangga") selected @endif>Pembantu Rumah Tangga</option>
                        <option value="Tukang Cukur" @if($warga->pekerjaan == "Tukang Cukur") selected @endif>Tukang Cukur</option>
                        <option value="Tukang Listrik" @if($warga->pekerjaan == "Tukang Listrik") selected @endif>Tukang Listrik</option>
                        <option value="Tukang Batu" @if($warga->pekerjaan == "Tukang Batu") selected @endif>Tukang Batu</option>
                        <option value="Tukang Kayu" @if($warga->pekerjaan == "Tukang Kayu") selected @endif>Tukang Kayu</option>
                        <option value="Tukang Sol Sepatu" @if($warga->pekerjaan == "Tukang Sol Sepatu") selected @endif>Tukang Sol Sepatu</option>
                        <option value="Tukang Las / Pandai Besi" @if($warga->pekerjaan == "Tukang Las / Pandai Besi") selected @endif>Tukang Las / Pandai Besi</option>
                        <option value="Tukang Jahit" @if($warga->pekerjaan == "Tukang Jahit") selected @endif>Tukang Jahit</option>
                        <option value="Penata Rambut" @if($warga->pekerjaan == "Penata Rambut") selected @endif>Penata Rambut</option>
                        <option value="Penata Rias" @if($warga->pekerjaan == "Penata Rias") selected @endif>Penata Rias</option>
                        <option value="Penata Busana" @if($warga->pekerjaan == "Penata Busana") selected @endif>Penata Busana</option>
                        <option value="Mekanik" @if($warga->pekerjaan == "Mekanik") selected @endif>Mekanik</option>
                        <option value="Tukang Gigi" @if($warga->pekerjaan == "Tukang Gigi") selected @endif>Tukang Gigi</option>
                        <option value="Seniman" @if($warga->pekerjaan == "Seniman") selected @endif>Seniman</option>
                        <option value="Tabib" @if($warga->pekerjaan == "Tabib") selected @endif>Tabib</option>
                        <option value="Paraji" @if($warga->pekerjaan == "Paraji") selected @endif>Paraji</option>
                        <option value="Perancang Busana" @if($warga->pekerjaan == "Perancang Busana") selected @endif>Perancang Busana</option>
                        <option value="Penerjemah" @if($warga->pekerjaan == "Penerjemah") selected @endif>Penerjemah</option>
                        <option value="Imam Masjid" @if($warga->pekerjaan == "Imam Masjid") selected @endif>Imam Masjid</option>
                        <option value="Pendeta" @if($warga->pekerjaan == "Pendeta") selected @endif>Pendeta</option>
                        <option value="Pastur" @if($warga->pekerjaan == "Pastur") selected @endif>Pastur</option>
                        <option value="Wartawan" @if($warga->pekerjaan == "Wartawan") selected @endif>Wartawan</option>
                        <option value="Ustadz / Mubaligh" @if($warga->pekerjaan == "Ustadz / Mubaligh") selected @endif>Ustadz / Mubaligh</option>
                        <option value="Juru Masak" @if($warga->pekerjaan == "Juru Masak") selected @endif>Juru Masak</option>
                        <option value="Promotor Acara" @if($warga->pekerjaan == "Promotor Acara") selected @endif>Promotor Acara</option>
                        <option value="Anggota DPR-RI" @if($warga->pekerjaan == "Anggota DPR-RI") selected @endif>Anggota DPR-RI</option>
                        <option value="Anggota DPD" @if($warga->pekerjaan == "Anggota DPD") selected @endif>Anggota DPD</option>
                        <option value="Anggota BPK" @if($warga->pekerjaan == "Anggota BPK") selected @endif>Anggota BPK</option>
                        <option value="Presiden" @if($warga->pekerjaan == "Presiden") selected @endif>Presiden</option>
                        <option value="Wakil Presiden" @if($warga->pekerjaan == "Wakil Presiden") selected @endif>Wakil Presiden</option>
                        <option value="Anggota Mahkamah Konstitusi" @if($warga->pekerjaan == "Anggota Mahkamah Konstitusi") selected @endif>Anggota Mahkamah Konstitusi</option>
                        <option value="Anggota Kabinet / Kementerian" @if($warga->pekerjaan == "Anggota Kabinet / Kementerian") selected @endif>Anggota Kabinet / Kementerian</option>
                        <option value="Duta Besar" @if($warga->pekerjaan == "Duta Besar") selected @endif>Duta Besar</option>
                        <option value="Gubernur" @if($warga->pekerjaan == "Gubernur") selected @endif>Gubernur</option>
                        <option value="Wakil Gubernur" @if($warga->pekerjaan == "Wakil Gubernur") selected @endif>Wakil Gubernur</option>
                        <option value="Bupati" @if($warga->pekerjaan == "Bupati") selected @endif>Bupati</option>
                        <option value="Wakil Bupati" @if($warga->pekerjaan == "Wakil Bupati") selected @endif>Wakil Bupati</option>
                        <option value="Walikota" @if($warga->pekerjaan == "Walikota") selected @endif>Walikota</option>
                        <option value="Wakil Walikota" @if($warga->pekerjaan == "Wakil Walikota") selected @endif>Wakil Walikota</option>
                        <option value="Anggota DPRD Provinsi" @if($warga->pekerjaan == "Anggota DPRD Provinsi") selected @endif>Anggota DPRD Provinsi</option>
                        <option value="Anggota DPRD Kabupaten" @if($warga->pekerjaan == "Anggota DPRD Kabupaten") selected @endif>Anggota DPRD Kabupaten</option>
                        <option value="Dosen" @if($warga->pekerjaan == "Dosen") selected @endif>Dosen</option>
                        <option value="Guru" @if($warga->pekerjaan == "Guru") selected @endif>Guru</option>
                        <option value="Pilot" @if($warga->pekerjaan == "Pilot") selected @endif>Pilot</option>
                        <option value="Pengacara" @if($warga->pekerjaan == "Pengacara") selected @endif>Pengacara</option>
                        <option value="Notaris" @if($warga->pekerjaan == "Notaris") selected @endif>Notaris</option>
                        <option value="Arsitek" @if($warga->pekerjaan == "Arsitek") selected @endif>Arsitek</option>
                        <option value="Akuntan" @if($warga->pekerjaan == "Akuntan") selected @endif>Akuntan</option>
                        <option value="Konsultan" @if($warga->pekerjaan == "Konsultan") selected @endif>Konsultan</option>
                        <option value="Dokter" @if($warga->pekerjaan == "Dokter") selected @endif>Dokter</option>
                        <option value="Bidan" @if($warga->pekerjaan == "Bidan") selected @endif>Bidan</option>
                        <option value="Perawat" @if($warga->pekerjaan == "Perawat") selected @endif>Perawat</option>
                        <option value="Apoteker" @if($warga->pekerjaan == "Apoteker") selected @endif>Apoteker</option>
                        <option value="Psikiater / Psikolog" @if($warga->pekerjaan == "Psikiater / Psikolog") selected @endif>Psikiater / Psikolog</option>
                        <option value="Penyiar Televisi" @if($warga->pekerjaan == "Penyiar Televisi") selected @endif>Penyiar Televisi</option>
                        <option value="Penyiar Radio" @if($warga->pekerjaan == "Penyiar Radio") selected @endif>Penyiar Radio</option>
                        <option value="Pelaut" @if($warga->pekerjaan == "Pelaut") selected @endif>Pelaut</option>
                        <option value="Peneliti" @if($warga->pekerjaan == "Peneliti") selected @endif>Peneliti</option>
                        <option value="Sopir" @if($warga->pekerjaan == "Sopir") selected @endif>Sopir</option>
                        <option value="Pialang" @if($warga->pekerjaan == "Pialang") selected @endif>Pialang</option>
                        <option value="Paranormal" @if($warga->pekerjaan == "Paranormal") selected @endif>Paranormal</option>
                        <option value="Pedagang" @if($warga->pekerjaan == "Pedagang") selected @endif>Pedagang</option>
                        <option value="Perangkat Desa" @if($warga->pekerjaan == "Perangkat Desa") selected @endif>Perangkat Desa</option>
                        <option value="Kepala Desa" @if($warga->pekerjaan == "Kepala Desa") selected @endif>Kepala Desa</option>
                        <option value="Biarawati" @if($warga->pekerjaan == "Biarawati") selected @endif>Biarawati</option>
                        <option value="Wiraswasta" @if($warga->pekerjaan == "Wiraswasta") selected @endif>Wiraswasta</option>
                        <option value="Anggota Lembaga Tinggi" @if($warga->pekerjaan == "Anggota Lembaga Tinggi") selected @endif>Anggota Lembaga Tinggi</option>
                        <option value="Artis" @if($warga->pekerjaan == "Artis") selected @endif>Artis</option>
                        <option value="Atlit" @if($warga->pekerjaan == "Atlit") selected @endif>Atlit</option>
                        <option value="Chef" @if($warga->pekerjaan == "Chef") selected @endif>Chef</option>
                        <option value="Manajer" @if($warga->pekerjaan == "Manajer") selected @endif>Manajer</option>
                        <option value="Tenaga Tata Usaha" @if($warga->pekerjaan == "Tenaga Tata Usaha") selected @endif>Tenaga Tata Usaha</option>
                        <option value="Operator" @if($warga->pekerjaan == "Operator") selected @endif>Operator</option>
                        <option value="Pekerja Pengolahan, Kerajinan" @if($warga->pekerjaan == "Pekerja Pengolahan, Kerajinan") selected @endif>Pekerja Pengolahan, Kerajinan</option>
                        <option value="Teknisi" @if($warga->pekerjaan == "Teknisi") selected @endif>Teknisi</option>
                        <option value="Asisten Ahli" @if($warga->pekerjaan == "Asisten Ahli") selected @endif>Asisten Ahli</option>
                        <option value="Lainnya" @if($warga->pekerjaan == "Lainnya") selected @endif>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <select id="kewarganegaraan" name="kewarganegaraan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected disabled>Pilih kewarganegaraan:</option>
                        <option @if($warga->kewarganegaraan == "WNI") selected @endif value="WNI">WNI</option>
                        <option @if($warga->kewarganegaraan == "WNA") selected @endif value="WNA">WNA</option>
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