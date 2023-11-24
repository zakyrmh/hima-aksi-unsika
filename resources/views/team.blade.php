@extends('layouts.index')

@section('container')
    <h2 class="text-lg font-bold">Team</h2>
    <div class="mt-4">
        <table class="table-auto w-full border-collapse border border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Nama</th>
                    <th class="border border-slate-600">Email</th>
                    <th class="border border-slate-600">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-slate-700 pl-2">{{ $user->name }}</td>
                        <td class="border border-slate-700 pl-2">{{ $user->email }}</td>
                        <td class="border border-slate-700 pl-2">#</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
