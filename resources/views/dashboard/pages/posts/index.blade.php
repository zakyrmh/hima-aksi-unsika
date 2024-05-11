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
                        <button type="button"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            post</button>
                        <button type="button"
                            class="block rounded-md bg-emerald-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Add
                            category</button>
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
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"><span
                                                class="absolute w-[1px] h-[1px] p-0 -m-[1px] overflow-hidden whitespace-nowrap border-0">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="acc acg">
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            Lorem ipsum dolor sit amet.</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1 Mey 2024
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            News</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Posted</td>
                                        <td
                                            class="relative flex gap-x-3 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-gray-600 hover:text-indigo-900">Show</a>
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            Lorem ipsum dolor sit amet consectetur.</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">3 Mey 2024
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            Event</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Draft</td>
                                        <td
                                            class="relative flex gap-x-3 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-gray-600 hover:text-indigo-900">Show</a>
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-indigo-900">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
