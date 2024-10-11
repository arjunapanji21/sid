@extends('layout')

@section('content')
<h1 class="text-xl text-center py-5">Selamat Datang, <span class="font-semibold">{{auth()->user()->nama}}</span>!</h1>
<div class="grid lg:grid-cols-2 gap-5">
    <div class="bg-white rounded-lg shadow-lg p-4 text-right">
        <div class="flex justify-between items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-12 h-12 text-primary-700" fill="currentColor"><path d="M215.4 96L144 96l-36.2 0L96 96l0 8.8L96 144l0 40.4 0 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3 48 96c0-26.5 21.5-48 48-48l76.6 0 49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48 416 48c26.5 0 48 21.5 48 48l0 44.3 22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4l0-89 0-40.4 0-39.2 0-8.8-11.8 0L368 96l-71.4 0-81.3 0zM0 448L0 242.1 217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1 512 448s0 0 0 0c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64c0 0 0 0 0 0zM176 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            </div>
            <div>
                <h3 class="font-semibold text-xl">
                    Pengajuan Surat
                </h3>
                <p class="font-bold text-4xl">{{$jumlah_pengajuan}}</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-4 text-right">
        <div class="flex justify-between items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-12 h-12 text-primary-700" fill="currentColor"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
            </div>
            <div>
                <h3 class="font-semibold text-xl">
                    Jumlah Warga
                </h3>
                <p class="font-bold text-4xl">{{$jumlah_warga}}</p>
            </div>
        </div>
    </div>
</div>

<section class="">
    <div class="">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                {{-- <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div> --}}
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="{{route('buat_surat')}}" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Buat Surat
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto min-h-80">
                <table class="text-sm w-full text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No. Surat</th>
                            <th scope="col" class="px-4 py-3">Tgl. Pengajuan</th>
                            <th scope="col" class="px-4 py-3">Jenis Surat</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            {{-- <th scope="col" class="px-4 py-3">Status</th> --}}
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuan as $row)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$row->no_surat}}</th>
                            <td class="px-4 py-3">{{date('d/m/Y', strtotime($row->created_at))}}</td>
                            <td class="px-4 py-3">{{$row->jenis_surat}}</td>
                            <td class="px-4 py-3"><span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$row->status_pengajuan}}</span></td>
                            {{-- <td class="px-4 py-3">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$row->status_pengajuan}}</span>
                            </td> --}}
                                <td class="px-4 py-3 flex items-center justify-end">
                                <button id="data{{$row->id}}-button" data-dropdown-toggle="data{{$row->id}}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="data{{$row->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="data{{$row->id}}-button">
                                        @if(auth()->user()->role == "Admin")
                                        <li>
                                            <a href="{{route('edit_pengajuan_surat', $row->id)}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit Surat</a>
                                        </li>
                                        <li>
                                            <a href="{{route('show_pengajuan_surat', $row->id)}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                                        </li>
                                        @elseif(auth()->user()->role != "Admin" && !is_null($row->file))
                                        <li>
                                            <a href="{{asset('uploads/surat/'.$row->file)}}" download class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="py-1">
                                        @if(auth()->user()->role == "Admin")
                                        <a href="{{route('hapus_pengajuan_surat', $row->id)}}" onclick="return confirm('Hapus pengajuan surat ini?')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Hapus</a>
                                        @elseif(auth()->user()->role != "Admin" && $row->status_pengajuan == "Sedang Diproses")
                                        <a onclick="alert('Surat sedang diproses, pengajuan surat tidak bisa dibatalkan!')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Batalkan</a>
                                        @elseif(auth()->user()->role != "Admin" && $row->status_pengajuan == "Dalam Antrean")
                                        <a href="{{route('hapus_pengajuan_surat', $row->id)}}" onclick="return confirm('Hapus pengajuan surat ini?')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Batalkan</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@if(auth()->user()->role == "Admin")
<section class="">
    <div class="">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <h3 class="font-semibold text-lg">Pengguna Baru Belum Di Konfirmasi</h3>
            </div>
            <div class="overflow-x-auto min-h-80">
                <table class="text-sm w-full text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Tgl. Bergabung</th>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">NIK</th>
                            <th scope="col" class="px-4 py-3">Alamat</th>
                            <th scope="col" class="px-4 py-3 text-center">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($new_user as $row)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{date('d/m/Y', strtotime($row->created_at))}}</th>
                            <td class="px-4 py-3">{{$row->nama}}</td>
                            <td class="px-4 py-3">{{$row->nik}}</td>
                            <td class="px-4 py-3">{{$row->alamat}}</td>
                            <td class="px-4 py-3 text-center"><span class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Belum Di Konfirmasi</span></td>
                            {{-- <td class="px-4 py-3">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$row->status_pengajuan}}</span>
                            </td> --}}
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <a href="{{route('konfirmasi_data_warga', $row->id)}}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Konfirmasi</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif
@endsection