@extends('website.layouts.root')
@section('content')
    <section
        class="flex flex-col justify-center min-h-screen px-6 mx-auto lg:px-8 md:flex-row-reverse md:justify-center md:gap-x-6 md:flex-wrap md:items-center sm:max-w-lg md:max-w-2xl lg:max-w-full">
        <div class="mt-10 lg:mt-0">
            <img class="rounded-md md:max-w-60 lg:max-w-sm" src="{{ asset('assets/images/background.png') }}"
                alt="Background Photo Hima-Aksi Unsika">
        </div>
        <div class="mt-8 md:max-w-80 lg:max-w-lg">
            <div class="text-center">
                <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl lg:text-4xl">Selamat Data di Himpunan
                    Mahasiswa
                    Fakultas Ekonomi</h1>
                <p class="mt-4 text-lg leading-8 text-gray-600">UNIVERSITAS SINGABERBANGSA KARAWANG</p>
            </div>
        </div>
    </section>
    <section class="px-6 mx-auto lg:max-w-3xl lg:px-8 lg:mx-auto sm:max-w-lg md:max-w-2xl">
        <h2 class="text-lg font-bold tracking-tight text-center text-gray-900 sm:text-xl lg:text-3xl">Deskripsi</h2>
        <p class="mt-4 leading-8 text-justify text-gray-600">HIMA-AKSI merupakan Organisasi Mahasiswa Prodi Akuntansi yang
            mewadahi aspirasi dan
            kreativitas Mahasiswa Prodi
            D3 dan S1 Akuntansi Fakultas Ekonomi Universitas Singaperbangsa Karawang dalam hal pengkajian akuntansi,
            kewirausahaan, pengembangan sumber daya organisasi, komunikasi-informasi, minat dan bakat, serta pengabdian
            kepada masyarakat. Bertujuan untuk menjalin kerja sama antar Mahasiswa Prodi Akuntansi pada khususnya dan
            Fakultas Ekonomi pada umumnya untuk meningkatkan intelektualitas dan profesionalisme serta mewujudkan kinerja
            yang efektif dan efisien.</p>
    </section>
    <section
        class="flex flex-col justify-center gap-4 px-6 mx-auto mt-4 lg:px-8 md:flex-row lg:max-w-3xl lg:mx-auto sm:max-w-lg md:max-w-2xl">
        <div class="p-4 text-gray-600 bg-white rounded-lg shadow-lg sm:max-w-full md:w-1/2">
            <h3 class="mb-2 text-lg font-semibold text-center lg:text-xl">Visi</h3>
            <p class="leading-6 text-justify">
                Menjadikan HIMA-AKSI sebagai organisasi mahasiswa yang menjunjung tinggi rasa kekeluargaan,
                profesionalisme, dan mengembangkan kualitas, kreativitas serta
                intelektualitas pengurus agar terciptanya sumber daya manusia yang siap berkontribusi kepada
                masyarakat, khususnya kepada Mahasiswa Akuntansi Fakultas Ekonomi Universitas Singaperbangsa
                Karawang.
            </p>
        </div>
        <div class="p-4 text-gray-600 bg-white rounded-lg shadow-lg sm:max-w-full md:w-1/2">
            <h3 class="mb-2 text-lg font-semibold text-center lg:text-xl">Misi</h3>
            <ul class="pl-4 leading-6 text-justify list-disc lg:text-base">
                <li>
                    Menciptakan ikatan erat pengurus HIMA-AKSI yang selanjutnya mempererat hubungan dengan
                    mahasiswa akuntansi FE UNSIKA serta menjalin komunikasi baik kepada civitas FE UNSIKA
                </li>
                <li class="mt-2">
                    Menyediakan tempat lalu menyampaikan aspirasi serta mengembangkan minat-bakat yang
                    dimiliki mahasiswa akuntansi FE UNSIKA
                </li>
                <li class="mt-2">
                    Menjalankan periode kepengurusan HIMA-AKSI dengan penerapan kedisiplinan, keterbukaan,
                    serta kebebasan dalam berpendapat.
                </li>
                <li class="mt-2">
                    Membuat program kerja dengan berlandaskan tri dharma dengan tujuan pengembangan kualitas
                    dan kreativitas pengurus serta bermanfaat bagi masyarakat luas.
                </li>
            </ul>
        </div>
    </section>
    <section class="mt-8">
        @foreach ($cabinets as $cabinet)
            <div class="w-full bg-center bg-cover h-[38rem]"
                style="background-image: url('{{ asset($cabinet->background) }}');">
                <div class="flex flex-col items-center justify-center w-full h-full px-6 text-white dark:bg-gray-900/40">
                    <h4 class="text-xl font-semibold">#Kabinet</h4>
                    <h3 class="text-2xl font-bold">{{ $cabinet->title }}</h3>
                    <div class="flex flex-col items-center justify-center gap-4 mt-6 md:flex-row">
                        <img src="{{ asset($cabinet->logo) }}" alt="Logo kabinet {{ $cabinet->title }}"
                            class="w-20 md:w-28">
                        <div class="leading-6 text-justify sm:max-w-md lg:max-w-2xl">
                            {!! $cabinet->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section class="mt-14">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900 sm:text-4xl">Berita</h2>
            <div
                class="grid max-w-2xl grid-cols-1 pt-10 mx-auto mt-4 border-t border-gray-200 gap-x-8 gap-y-16 sm:mt-8 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="flex flex-col items-start justify-between max-w-xl">
                        <div class="relative w-full">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                        </div>
                        <div class="flex items-center mt-4 text-xs gap-x-4">
                            <time class="text-gray-500">{{ $post->date }}</time>
                            <a href="#"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category }}</a>
                        </div>
                        <div class="relative group">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="/blog/{{ $post->link }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <div class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
