@extends('dashboard.layouts.root')
@section('content')
    <section>
        <div class="mx-4">
            <img class="w-full aspect-[16/6] object-cover rounded-lg" src="{{ asset($memberCategory->background) }}"
                alt="{{ $memberCategory->title }}">
        </div>
        <div class="mt-6 mx-4 sm:mx-0">
            <div class="text-center">
                <h3 class="text-3xl font-bold tracking-tight text-gray-900 mb-2">{{ $memberCategory->title }}</h3>
                <span class="text-sm text-gray-700">{{ $memberCategory->period }}</span>
            </div>
            <p class="text-base leading-7 text-gray-700 mt-4 mx-auto md:max-w-xl lg:max-w-3xl xl:max-w-5xl ">
                {{ $memberCategory->description }}
            </p>
        </div>
        <div class="flex justify-center gap-4 mt-4">
            @forelse($memberCategory->members as $member)
                <div class="max-w-44 overflow-hidden bg-white rounded-lg shadow-md">
                    <img class="object-cover w-full aspect-square" src="{{ asset($member->photo) }}"
                        alt="{{ $member->name }}">

                    <div class="p-6">
                        <div>
                            <h4 class="block mt-2 text-lg font-semibold text-gray-800">{{ $member->name }}
                            </h4>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                                {{ $member->position }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No members in this category.</p>
            @endforelse
        </div>
    </section>
@endsection
