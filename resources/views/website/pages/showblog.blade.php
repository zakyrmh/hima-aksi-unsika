@extends('website.layouts.root')
@section('content')
    <section class="bg-white">
        <div class="container px-6 py-10 mx-auto">
            <div class="lg:flex lg:-mx-6">
                <div class="lg:w-3/4 lg:px-6">
                    <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl"
                        src="{{ asset($post->image) }}" alt="{{ $post->title }}">

                    <div>
                        <p class="mt-6 text-sm text-blue-500 uppercase">{{ $post->category }}</p>

                        <h1 class="max-w-lg mt-2 text-2xl font-semibold leading-tight text-gray-800">
                            {{ $post->title }}
                        </h1>

                        <div class="flex items-center mt-3 gap-4">
                            <h1 class="text-sm text-gray-700">{{ $post->user->name }}</h1>
                            <p class="text-sm text-gray-500">{{ $post->date }}</p>
                        </div>
                    </div>
                    <div class="text-gray-700 mt-8">
                        {!! $post->body !!}
                    </div>
                </div>

                <div class="mt-8 lg:w-1/4 lg:mt-0 lg:px-6">
                    @foreach ($posts as $post)
                        <div>
                            <h3 class="text-blue-500 capitalize">{{ $post->category }}</h3>

                            <a href="/blog/{{ $post->link }}"
                                class="block mt-2 font-medium text-gray-700 hover:underline hover:text-gray-500">
                                {{ $post->title }}
                            </a>
                        </div>
                        <hr class="my-6 border-gray-200">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
