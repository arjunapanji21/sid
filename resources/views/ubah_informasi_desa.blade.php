@extends('layout')

@section('content')
<form action="{{route('update_informasi_desa', $informasi->id)}}" method="post">
    @csrf
    <div class="grid gap-3">
        <div>
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">judul</label>
            <input type="text" name="judul" id="judul" value="{{$informasi->judul}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berikan judul informasi" required />
        </div>
        <div>
            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{$informasi->tanggal}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tanggal" required />
        </div>
        <textarea name="konten" id="myeditorinstance" placeholder="Ketikkan sesuatu...">{{$informasi->konten}}</textarea>
    </div>
    <div class="flex gap-2 justify-end">
        <button type="submit"
            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Simpan
        </button>
        <a href="{{route('informasi_desa')}}"
            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-primary-700  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-200">
            Batalkan
        </a>
    </div>
  </form>
@endsection

@section('script')
<script src="https://cdn.tiny.cloud/1/rv99h1969cz8vuvq7aazmlxh656sqyztcqnyef2zpf1bkloi/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists image',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
    menubar: ''
  });
</script>
@endsection