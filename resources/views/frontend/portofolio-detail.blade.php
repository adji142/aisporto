@extends('frontend.layout')

@section('content')

{{-- Breadcrumb --}}
@include('frontend.sections.Portofolio.breadcrumbdetail')

{{-- Detail Content --}}
<div class="container mx-auto px-4 py-10">
    <div class="grid md:grid-cols-2 gap-8">

        {{-- Swiper Slider --}}
        <div>
            <div class="swiper portfolio-swiper rounded-lg shadow-lg">
                <div class="swiper-wrapper">
                    {{-- Slide: Thumbnail utama (jika ada) --}}
                    @if($portfolio->thumbnail)
                        <div class="swiper-slide">
                            <a href="{{ asset('storage/'.$portfolio->thumbnail) }}" data-fslightbox="portfolio">
                                <img src="{{ asset('storage/'.$portfolio->thumbnail) }}"
                                     alt="{{ $portfolio->title }}"
                                     class="w-full h-80 object-cover rounded-lg">
                            </a>
                        </div>
                    @endif

                    {{-- Slide: Multiple images --}}
                    @foreach($portfolio->images as $img)
                        <div class="swiper-slide">
                            <a href="{{ asset('storage/'.$img->image) }}" data-fslightbox="portfolio">
                                <img src="{{ asset('storage/'.$img->image) }}"
                                     alt="{{ $portfolio->title }}"
                                     class="w-full h-80 object-cover rounded-lg">
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Navigation & Pagination (di dalam container agar selector pasti ketemu) --}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        {{-- Info --}}
        <div>
            @if($portfolio->headline)
                <p class="text-sm text-gray-500 uppercase mb-2">{{ $portfolio->headline }}</p>
            @endif

            <h2 class="text-2xl font-semibold mb-4">{{ $portfolio->title }}</h2>

            <div class="prose max-w-none text-gray-700 mb-6">{!! $portfolio->description !!}</div>

            @if($portfolio->link)
                <a href="{{ $portfolio->link }}" target="_blank"
                   class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Lihat Proyek
                </a>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const el = document.querySelector('.portfolio-swiper');
        if (!el) return;

        // Inisialisasi Swiper dengan selector elemen di dalam container,
        // supaya tidak bentrok kalau ada Swiper lain di halaman.
        new Swiper(el, {
            loop: true,
            spaceBetween: 16,
            slidesPerView: 1,
            grabCursor: true,
            // optional autoplay
            // autoplay: { delay: 3500, disableOnInteraction: false },
            pagination: {
                el: el.querySelector('.swiper-pagination'),
                clickable: true,
            },
            navigation: {
                nextEl: el.querySelector('.swiper-button-next'),
                prevEl: el.querySelector('.swiper-button-prev'),
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                1024: { slidesPerView: 1 },
            },
        });

        // FS Lightbox auto-works saat menemukan atribut data-fslightbox
    });
</script>


@endsection
