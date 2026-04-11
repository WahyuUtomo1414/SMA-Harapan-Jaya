@extends('layouts.app')

@section('title', 'SMA Harapan Jaya | Membangun Generasi Unggul')

@section('content')
    @include('sections.home.hero')
    @include('sections.home.about')
    @include('sections.home.stats')
    @include('sections.home.gallery')
    @include('sections.home.news')
    @include('sections.home.faq')
    @include('sections.home.cta')
@endsection
