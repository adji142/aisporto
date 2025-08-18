@extends('frontend.layout')

@section('title', 'Portfolio')

@section('content')
{{-- Hero Section --}}
@include('frontend.sections.Blog.breadcrumb')
@include('frontend.sections.Blog.content')
{{-- Portfolio Grid --}}
@endsection