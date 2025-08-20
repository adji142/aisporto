@extends('frontend.layout')

@section('title', 'Blog')

@section('content')
{{-- Hero Section --}}
@include('frontend.sections.Blog.breadcrumb')
@include('frontend.sections.Blog.content')
{{-- Portfolio Grid --}}
@endsection