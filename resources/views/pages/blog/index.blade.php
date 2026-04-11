@extends('layouts.app')

@section('title', 'Berita & Informasi | SMA Harapan Jaya')

@section('content')
    @include('sections.blog.header')
    @include('sections.blog.filter')
    @include('sections.blog.grid')
@endsection
