@extends('frontend.layout')

@section('title', 'Portfolio')

@section('content')
{{-- Hero Section --}}
@include('frontend.sections.Portofolio.breadcrumb')
@include('frontend.sections.Portofolio.content')
{{-- Portfolio Grid --}}
@endsection