@extends('layouts.dashboard')

@section('title', 'Edit Absensi')
@section('page_title', 'Edit Absensi')

@section('content')
<div class="max-w-6xl mx-auto">

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-6">Edit Absensi</h1>

    <form method="POST" action="{{ route('guru.absensi.update', $absensi->id) }}">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow border">

            @foreach($absensi->absensiDetail as $detail)
            <div class="p-5 border-b flex flex-col md:flex-row justify-between gap-4">

                <div>
                    <p class="font-bold">{{ $detail->murid->nama }}</p>
                    <p class="text-xs text-gray-400">NISN: {{ $detail->murid->nisn }}</p>
                </div>

                {{-- STATUS --}}
                <div class="flex gap-2 flex-wrap">
                    @foreach(['hadir','izin','sakit','alpha'] as $status)

                    <label class="cursor-pointer">
                        <input type="radio"
                               name="absensi[{{ $detail->murid_id }}]"
                               value="{{ $status }}"
                               required
                               {{ $detail->status_absen == $status ? 'checked' : '' }}>

                        <span class="px-3 py-1 border rounded-lg text-sm">
                            {{ $status }}
                        </span>
                    </label>

                    @endforeach
                </div>

                {{-- KETERANGAN --}}
                <input type="text"
                       name="keterangan[{{ $detail->murid_id }}]"
                       value="{{ $detail->keterangan }}"
                       class="border rounded-lg px-3 py-1 w-60"
                       placeholder="Keterangan">

            </div>
            @endforeach

        </div>

        <div class="mt-6 text-right">
            <button class="bg-emerald-600 text-white px-6 py-2 rounded-xl">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection