@extends('website.layouts.root')
@section('content')
    <section class="px-6 py-12 sm:py-20 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Organization Team</h2>
        </div>
        <div class="md:mt-3">
            @foreach ($categories as $category)
                <h3 class="text-center text-xl font-bold tracking-tight text-gray-900 mt-10 mb-4 sm:text-2xl">
                    {{ $category->title }}
                </h3>
                <div
                    class="grid justify-items-center grid-cols-2 gap-4 max-w-fit mx-auto mt-4 sm:grid-cols-3 {{ $category->members->count() >= 4 ? 'md:grid-cols-4' : '' }}">
                    @foreach ($category->members as $member)
                        <div class="max-w-44 overflow-hidden bg-white rounded-lg shadow-md">
                            <img class="object-cover w-full aspect-square" src="{{ asset($member->photo) }}"
                                alt="{{ $member->name }}">

                            <div class="p-6">
                                <div>
                                    <h4 class="block mt-2 text-lg font-semibold text-gray-800">{{ $member->name }}
                                    </h4>
                                    <p class="mt-2 text-sm text-gray-600">
                                        {{ $member->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endsection
