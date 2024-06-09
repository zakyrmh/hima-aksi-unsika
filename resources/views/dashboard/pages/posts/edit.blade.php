@extends('dashboard.layouts.root')
@section('content')
    <div class="mx-4 mt-10 sm:mx-auto sm:w-full">
        <form class="space-y-6" action="{{ route('posts.update', ['post' => $post]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input id="title" name="title" type="text" autocomplete="title"
                        value="{{ old('title', $post->title) }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="md:flex md:gap-x-4">
                <div class="space-y-6 md:w-full md:max-w-[50%]">
                    <div>
                        <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                        <div class="mt-2">
                            <input id="date" name="date" type="date" autocomplete="date"
                                value="{{ old('date', $post->date) }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <div class="mt-2">
                            <input id="category" name="category" type="text" autocomplete="category"
                                value="{{ old('category', $post->category) }}" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                        <div class="mt-2">
                            <div class="relative flex gap-x-3">
                                <div class="flex h-6 items-center">
                                    <input id="status" name="status" type="checkbox"
                                        {{ $post->status ? 'checked' : '' }}
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="text-sm leading-6">
                                    <label for="status" class="font-medium text-gray-900">Posted</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:max-w-[50%]">
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                    <div class="flex flex-col items-center justify-center gap-2 w-full mt-2">
                        <img id="preview" class="w-full h-auto rounded-md cover md:w-[50%]"
                            src="{{ asset($post->image) }}" alt="">
                        <label for="image"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 ">SVG, PNG, or JPG (MAX. 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden"
                                onchange="previewImage(event)" />
                        </label>
                    </div>
                </div>
            </div>


            <div>
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                <div class="mt-2">
                    <div id="editor"></div>
                    <input type="hidden" id="body" name="body" value="{{ old('body', $post->body) }}">
                </div>
            </div>

            <div class="flex gap-x-2 sm:max-w-sm">
                <a href="/dashboard/members"
                    class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
@endsection
