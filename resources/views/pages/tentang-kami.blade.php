@extends('layouts.app')

@section('title', 'Tentang Kami | SMA Harapan Jaya')

@section('content')
    @include('sections.tentang-kami.hero')
    @include('sections.tentang-kami.visi-misi')
    @include('sections.tentang-kami.organisasi')
    @include('sections.tentang-kami.legalitas')
    {{-- @include('sections.tentang-kami.cta') --}}
@endsection
