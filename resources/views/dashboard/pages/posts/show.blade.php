@extends('dashboard.layouts.root')
@section('content')
    <div>
        <img class="w-full h-auto aspect-[16/6] object-cover" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
        <div class="mt-6 mx-4 sm:mx-0">
            <div class="text-center">
                <h3 class="text-3xl font-bold tracking-tight text-gray-900 mb-2">{{ $post->title }}</h3>
                <span class="text-sm text-gray-700">{{ $post->user->name }} • {{ $post->date }}</span>
            </div>
            <div class="text-base leading-7 text-gray-700 mt-4 mx-auto md:max-w-xl lg:max-w-3xl xl:max-w-5xl ">
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
