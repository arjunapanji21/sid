@extends('layout')

@section('content')
<div class="w-full max-w-md mx-auto">
    <a href="{{route('informasi_desa')}}"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Kembali
    </a>
</div>
<div class="w-full max-w-md mx-auto p-4 rounded-lg shadow bg-white">
    <h1 class="text-xl font-semibold">{{$informasi->judul}}</h1>
    <div class="flex justify-between border-b mb-2">
        <p>{{'Author: '.$informasi->penulis->nama}}</p>
        <p>{{date('d/m/Y', strtotime($informasi->tanggal)).' | views: '.$informasi->jumlah_dilihat}}</p>
    </div>
    <div style="text-align: justify">
        {!!$informasi->konten!!}
    </div>
</div>
<div class="w-full max-w-md mx-auto">
    <a href="{{route('informasi_desa')}}"
        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Kembali
    </a>
</div>
@endsection