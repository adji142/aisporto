@extends('frontend.layout')

@section('content')

{{-- Breadcrumb --}}
@include('frontend.sections.Blog.breadcrumbdetail')

{{-- Detail Content --}}
<div class="container mx-auto px-4 py-10">
    <div class="grid md:grid-cols-2 gap-8">

        {{-- Swiper Slider --}}
        <div>
            <div class="swiper blog-swiper rounded-lg shadow-lg">
                <div class="swiper-wrapper">
                    {{-- Slide: Thumbnail utama (jika ada) --}}
                    @if($blog->thumbnail)
                        <div class="swiper-slide">
                            <a href="{{ asset('storage/'.$blog->thumbnail) }}" data-fslightbox="blog">
                                <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                                     alt="{{ $blog->title }}"
                                     class="w-full h-80 object-cover rounded-lg">
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- Info --}}
        <div>
            @if($blog->headline)
                <p class="text-sm text-gray-500 uppercase mb-2">{{ $blog->headline }}</p>
            @endif

            <h2 class="text-2xl font-semibold mb-4">{{ $blog->title }}</h2>

            <div class="prose max-w-none text-gray-700 mb-6">{!! $blog->content !!}</div>

            @if($blog->link)
                <a href="{{ $blog->link }}" target="_blank"
                   class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Lihat Proyek
                </a>
            @endif
        </div>
    </div>
</div>



@endsection
