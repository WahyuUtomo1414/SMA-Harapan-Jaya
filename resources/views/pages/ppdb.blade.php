@extends('layouts.app')

@section('title', 'PPDB | SMA Harapan Jaya')

@section('content')
    @include('sections.ppdb.hero')
    @include('sections.ppdb.alur')
    @include('sections.ppdb.timeline')
    @include('sections.home.cta')
@endsection
