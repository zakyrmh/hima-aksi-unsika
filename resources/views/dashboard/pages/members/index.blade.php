@extends('dashboard.layouts.root')
@section('content')
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Member</h1>
                        <p class="mt-2 text-sm text-gray-700">List all member on your website including name, email, cellphone
                            number, and role.</p>
                    </div>
                    <div class="flex gap-4 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <button type="button"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            member</button>
                        <button type="button"
                            class="block rounded-md bg-emerald-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            category</button>
                    </div>
                </div>
                <div class="mt-8">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($member as $member)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="{{ $member->photo_url ?? 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                                        alt="{{ $member->name }}">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $member->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $member->email }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900 capitalize">{{ $member->role }}</p>
                                    {{-- @if ($member->last_activity())
                                        <p class="text-xs leading-5 text-gray-500">Online</p>
                                    @else
                                        <p class="mt-1 text-xs leading-5 text-gray-500">
                                            {{ $member->last_seen->diffForHumans() }}</p>
                                    @endif --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
