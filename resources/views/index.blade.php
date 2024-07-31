<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header class="sticky top-0 shadow-lg">
        <nav class="bg-primary-700  px-4 lg:px-6 py-2.5 ">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center">
                    <span class="self-center text-white text-xl font-semibold whitespace-nowrap dark:text-white">SID Ngaol Ilir</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="{{route('login')}}" class="text-primary-700 bg-white hover:bg-yellow-100 focus:ring-4 focus:ring-primary-700 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Masuk</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg lg:hidden hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#sejarah" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-primary-700 lg:hover:text-yellow-100 lg:p-0 dark:text-white lg:dark:hover:text-yellow-100 dark:hover:bg-gray-700 dark:hover:text-primary-700 lg:dark:hover:bg-transparent dark:border-gray-700">Sejarah</a>
                        </li>
                        <li>
                            <a href="#visi-misi" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-primary-700 lg:hover:text-yellow-100 lg:p-0 dark:text-white lg:dark:hover:text-yellow-100 dark:hover:bg-gray-700 dark:hover:text-primary-700 lg:dark:hover:bg-transparent dark:border-gray-700">Visi & Misi</a>
                        </li>
                        <li>
                            <a href="#kondisi-desa" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 hover:text-primary-700 lg:hover:text-yellow-100 lg:p-0 dark:text-white lg:dark:hover:text-yellow-100 dark:hover:bg-gray-700 dark:hover:text-primary-700 lg:dark:hover:bg-transparent dark:border-gray-700">Kondisi Desa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="bg-white dark:bg-gray-900 min-h-screen flex justify-center items-center">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Selamat Datang di Aplikasi Sistem Informasi Desa Ngaol Ilir</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 text-2xl lg:mb-8 md:text-3xl lg:text-4xl dark:text-gray-400">Kami dengan bangga mempersembahkan aplikasi sistem informasi yang dirancang khusus untuk memudahkan akses informasi dan pelayanan di Desa Ngaol Ilir.</p>
                <a href="{{route('login')}}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Masuk
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#sejarah" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Tentang Desa
                </a> 
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>                
        </div>
    </section>

    <section id="sejarah" class="bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center items-center">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Sejarah</h2>
                <p class="mb-4 font-light text-gray-500 text-xl dark:text-gray-400">Berdasarkan cerita dari para sesepuh Adat Negeri Ngaol Ilir, bahwa konon dulu di pimpin oleh marga hulu tabir, pada tahun 1910 di ganti dengan pasirah yang memimpin di Negeri Ngaol berbatas dengan lubuk klelawar mudik hinggo pamopek pintu koto.</p>
            </div>
            <div class="font-light text-gray-500 text-xl dark:text-gray-400">
                <p class="mb-4">Pada tahun 1935 lahirlah namanya dusun yaitu dusun 5 (lima) yang dipimpin oleh 5 (lima) datuk paduko rajo setiap dusunnya, dan pada tahun 1989 terbentuklah namanya Desa Ngaol yang dipimpin oleh Kadesnya M. NUR. MB dan pada tahun 2008 Desa Ngaol ini dimekarkan menjadi Dua desa Ngaol dan Desa Ngaol Ilir.</p>
            </div>
        </div>
    </section>

    <section id="visi-misi" class="bg-primary-700 dark:bg-green-900 min-h-screen flex justify-center items-center">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-100 text-xl dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-yellow-100 dark:text-white">Visi :</h2>
                <p class="mb-4 font-light text-gray-100 dark:text-gray-400">Terwujudnya Indonesia Maju yang Berdaulat, Mandiri, dan Berkepribadian Berlandaskan Gotong Royong.</p>
            </div>
            <div class="font-light text-gray-100 text-xl dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-yellow-100 dark:text-white">Misi :</h2>
                <ul class="max-w-md ml-5 space-y-1 text-gray-100 list-disc dark:text-gray-400">
                    <li>Peningkatan kualitas Manusia Indonesia</li>
                    <li>Struktur Ekonomi yang Produktif, Mandiri dan Berdaya saing</li>
                    <li>Pembangunan yang Merata dan Berkeadilan</li>
                    <li>Mencapai Lingkungan Hidup yang Berkelanjutan</li>
                    <li>Kemajuan Budaya yang Mencerminkan Kepribadian Bangsa</li>
                    <li>Penegakan Sistem Hukum yang Bebas Korupsi, Bemartabat, dan Terpercaya</li>
                    <li>Perlindungan Bagi Segenap Bangsa dan Memberikan Rasa Aman pada Seluruh Warga</li>
                    <li>Pengelolaan Pemerintah yang Bersih, Efektif, dan Terpercaya </li>
                    <li>Senergi Pemerintah Daerah dalam kerangka Negara Kesatuan.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="kondisi-desa" class="bg-white dark:bg-gray-900 min-h-screen flex justify-center items-center">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Kondisi Desa</h2>
                <h3 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">Aspek Geografi</h3>
                <p class="mb-4 font-light text-gray-500 text-xl dark:text-gray-400">Desa Ngaol Ilir merupakan salah satu Desa diwilayah Kecamatan Tabir Barat dan termasuk daerah dataran tinggi dengan suhu kurang lebih 28 derajat celcius, dengan curah hujan rata-rata 4-8 mm/tahun, Luas desa + : 23,87 hektar.</p>
            </div>
            <div class="font-light text-gray-500 text-xl dark:text-gray-400">
                <p class="mb-4">Posisi letak Desa Ngaol Ilir berada di dataran tinggi atau pegunungan dengan jarak ke Kecamatan sekitar 20 Km dan Ke Ibukota Kabupaten sekitar 105 Km.</p>
            </div>
            <div class="font-light text-gray-500 dark:text-gray-400">
                <h3 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">Aspek Demografi</h3>
                <p class="mb-4 font-light text-gray-500 text-xl dark:text-gray-400">Jumlah penduduk Desa Ngaol Ilir sebanyak 534 jiwa yang tersebar di 3 Dusun dan 5 RT. dari jumlah tersebut, terdiri dari laki-laki 258 jiwa dan perempuan 276 jiwa. Tingkat pertumbuhan rata-rata selama 6 (enam) tahun terakhir sebesar 5%, dengan tingkat kepadatan sebesar 178 jiwa/km2.</p>
            </div>
            <div class="font-light text-gray-500 text-xl dark:text-gray-400">
                <p class="mb-4">Posisi letak Desa Ngaol Ilir berada di dataran tinggi atau pegunungan dengan jarak ke Kecamatan sekitar 20 Km dan Ke Ibukota Kabupaten sekitar 105 Km.</p>
            </div>
        </div>
    </section>

    <footer class="p-4 bg-gray-100 md:p-8 lg:p-10 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl text-center">
            <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                SID Ngaol Ilir    
            </a>
            <p class="my-6 text-gray-500 dark:text-gray-400">Sistem Informasi Desa Ngaol Ilir</p>
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">SID Ngaol Ilir</a>. All Rights Reserved.</span>
        </div>
      </footer>
</body>
</html>