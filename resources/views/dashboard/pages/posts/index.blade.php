@extends('dashboard.layouts.root')
@section('content')
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Posts</h1>
                        <p class="mt-2 text-sm text-gray-700">List of all posts in your account including title, date,
                            category, and status.</p>
                    </div>
                    <div class="flex gap-4 mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="/dashboard/posts/create"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            post</a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full acc ach">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Title</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Date</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Category</th>
                                        @if (Auth::check() && Auth::user()->role === 'admin')
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Author</th>
                                        @endif
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"><span
                                                class="absolute w-[1px] h-[1px] p-0 -m-[1px] overflow-hidden whitespace-nowrap border-0">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="acc acg">
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                {{ $post->title }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $post->date }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $post->category }}</td>
                                            @if (Auth::check() && Auth::user()->role === 'admin')
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $post->user->name }}</td>
                                            @endif
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $post->status_text }}</td>
                                            <td
                                                class="relative flex gap-x-3 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                <a href="/dashboard/posts/{{ $post->id }}"
                                                    class="text-gray-600 hover:text-indigo-900">Show</a>
                                                <a href="/dashboard/posts/{{ $post->id }}/edit"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                                        href="#"
                                                        class="text-red-600 hover:text-indigo-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
