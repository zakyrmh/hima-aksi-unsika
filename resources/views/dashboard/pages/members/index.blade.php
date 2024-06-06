@extends('dashboard.layouts.root')
@section('content')
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Member</h1>
                        <p class="mt-2 text-sm text-gray-700">List all member on your website including name, email,
                            cellphone
                            number, and role.</p>
                    </div>
                    <div class="flex gap-4 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="/dashboard/members/create"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            member</a>
                    </div>
                </div>
                <div class="mt-8">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($members as $member)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                        src="{{ $member->photo ? asset($member->photo) : 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                                        alt="{{ $member->name }}">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $member->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $member->position }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <div class="flex gap-x-2 mb-2">
                                        <button type="button"
                                            class="rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-2 ring-inset ring-gray-300">Edit</button>
                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this member?')"
                                                class="rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-red-600 shadow-sm ring-2 ring-inset ring-red-300">Delete</button>
                                        </form>
                                    </div>
                                    <p class="text-sm leading-6 text-gray-900 capitalize">{{ $member->section }}</p>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
