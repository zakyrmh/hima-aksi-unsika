@extends('dashboard.layouts.root')
@section('content')
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('members.update', ['member' => $member]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name"
                        value="{{ old('name', $member->name) }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="position" class="block text-sm font-medium leading-6 text-gray-900">Position</label>
                <div class="mt-2">
                    <input id="position" name="position" type="text" autocomplete="position"
                        value="{{ old('position', $member->position) }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="section" class="block text-sm font-medium leading-6 text-gray-900">Section</label>
                <div class="mt-2">
                    <input id="section" name="section" type="text" autocomplete="section"
                        value="{{ old('section', $member->section) }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="period" class="block text-sm font-medium leading-6 text-gray-900">Period</label>
                <div class="mt-2">
                    <input id="period" name="period" type="text" autocomplete="period"
                        value="{{ old('period', $member->period) }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="flex items-start gap-x-2 mt-2">
                    <img id="preview" class="w-32 h-32 rounded-md cover"
                        src="{{ $member->photo ? asset($member->photo) : 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                        alt="{{ $member->name }}">
                    <input id="photo" name="photo" type="file" autocomplete="photo" value="{{ old('photo') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        onchange="previewImage(event)">
                </div>
            </div>


            <div class="flex gap-x-2">
                <a href="/dashboard/members"
                    class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    @endsection
