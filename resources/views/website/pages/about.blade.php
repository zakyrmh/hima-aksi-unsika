@extends('website.layouts.root')
@section('content')
    <section class="px-6 py-12 sm:py-20 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Organization Team</h2>
        </div>
        <div class="tabs md:mt-2">
            <nav class="isolate flex justify-center rounded-lg shadow-lg divide-x divide-slate-300 w-fit mx-auto">
                @foreach ($categoriesByPeriod as $period => $categories)
                    <a class="relative  text-gray-900 text-center text-sm py-4 px-6 rounded-l-lg"
                        data-tab="{{ $period }}">
                        Periode {{ $period }}
                    </a>
                @endforeach
            </nav>
        </div>
        @foreach ($categoriesByPeriod as $period => $categories)
            <div class="tab-content hidden" id="tab-{{ $period }}">
                @foreach ($categories as $category)
                    <h3 class="text-center text-xl font-bold tracking-tight text-gray-900 mt-10 mb-4 sm:text-2xl">
                        {{ $category->title }}
                    </h3>
                    <div class="flex items-center justify-center w-full">
                        <div class="max-w-44 overflow-hidden bg-white rounded-lg shadow-md">
                            <img class="object-cover w-full aspect-square"
                                src="{{ asset($category->members->first()->photo) }}"
                                alt="{{ $category->members->first()->name }}">

                            <div class="p-6">
                                <div>
                                    <h4 class="block mt-2 text-lg font-semibold text-gray-800">
                                        {{ $category->members->first()->name }}
                                    </h4>
                                    <p class="mt-2 text-sm text-gray-600">
                                        {{ $category->members->first()->position }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="grid justify-items-center grid-cols-2 gap-4 max-w-fit mx-auto mt-4 {{ $category->members->count() > 3 ? 'sm:grid-cols-3' : '' }} {{ $category->members->count() > 4 ? 'md:grid-cols-4' : '' }}">
                        @foreach ($category->members->slice(1) as $member)
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
        @endforeach
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tabs nav a');
            const contents = document.querySelectorAll('.tab-content');
            const defaultPeriod = @json($latestPeriod);

            tabs.forEach(tab => {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();

                    const period = this.getAttribute('data-tab');

                    tabs.forEach(t => t.classList.remove('text-blue-500'));
                    contents.forEach(content => content.classList.add('hidden'));

                    this.classList.add('text-blue-500');
                    document.getElementById(`tab-${period}`).classList.remove('hidden');
                });
            });

            // Show the first tab and content by default
            const defaultTab = document.querySelector(`[data-tab="${defaultPeriod}"]`);
            if (defaultTab) {
                defaultTab.click();
            }
        });
    </script>
@endsection
