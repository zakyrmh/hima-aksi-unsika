@extends('dashboard.layouts.root')
@section('content')
    <section>
        <h3 class="text-xl font-bold tracking-tight text-gray-900 mb-2">{{ $message->name }}</h3>
        <p class="text-sm tracking-tight text-gray-600 mb-4">{{ $message->email }}</p>
        <p class="text-gray-600 leading-6">{{ $message->message }}</p>
    </section>
@endsection
