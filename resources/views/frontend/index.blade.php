@extends('frontend.layout')

@section('content')

@include('frontend.sections.hero')
@include('frontend.sections.services')
@include('frontend.sections.Portfolio')
@include('frontend.sections.highlight-product')
@include('frontend.sections.blog')
@include('frontend.sections.kontak')

<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20 relative overflow-hidden text-white">
    <div class="container mx-auto px-6 lg:px-16 grid grid-cols-1 md:grid-cols-3 gap-10">
        
        {{-- Kolom 1: Deskripsi Singkat --}}
        <div>
            <h3 class="text-xl font-bold mb-4">{{ $siteSetting->site_name ?? 'Nama Website' }}</h3>
            <p class="text-white/80 leading-relaxed">
                {{ $siteSetting->site_description ?? 'Website ini dibuat untuk memberikan informasi dan layanan terbaik bagi pengguna.' }}
            </p>
        </div>

        {{-- Kolom 2: Sitemap --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Sitemap</h4>
            <ul class="space-y-2">
                <li><a href="{{ url('/') }}" class="hover:underline">Beranda</a></li>
                <li><a href="{{ url('/blog') }}" class="hover:underline">Blog</a></li>
                <li><a href="{{ url('/about') }}" class="hover:underline">Tentang Kami</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:underline">Kontak</a></li>
                <li><a href="{{ url('/services') }}" class="hover:underline">Layanan</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Sosial Media --}}
        <div>
            <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
            <div class="flex space-x-4">
                @if ($siteSetting->facebook_url)
                    <a href="{{ $siteSetting->facebook_url }}" target="_blank" class="hover:text-blue-400">
                        {{-- Facebook --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12.073C22 6.49 17.523 2 12 2S2 6.49 2 12.073c0 4.99 3.657 9.128 8.438 9.88v-6.987H7.898V12.07h2.54V9.797c0-2.506 1.493-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.946h2.773l-.443 2.896h-2.33v6.987C18.343 21.2 22 17.062 22 12.073z"/>
                        </svg>
                    </a>
                @endif
                @if ($siteSetting->instagram_url)
                    <a href="{{ $siteSetting->instagram_url }}" target="_blank" class="hover:text-pink-400">
                        {{-- Instagram --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-2a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
                        </svg>
                    </a>
                @endif
                @if ($siteSetting->twitter_url)
                    <a href="{{ $siteSetting->twitter_url }}" target="_blank" class="hover:text-sky-400">
                        {{-- Twitter --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.59-2.46.69a4.27 4.27 0 001.88-2.36 8.51 8.51 0 01-2.7 1.03 4.26 4.26 0 00-7.26 3.88A12.09 12.09 0 013 4.67a4.26 4.26 0 001.32 5.69 4.22 4.22 0 01-1.93-.53v.05a4.26 4.26 0 003.42 4.18 4.28 4.28 0 01-1.92.07 4.27 4.27 0 003.99 2.97A8.54 8.54 0 012 19.54a12.06 12.06 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19-.01-.39-.02-.58A8.7 8.7 0 0022.46 6z"/>
                        </svg>
                    </a>
                @endif
                @if ($siteSetting->youtube_url)
                    <a href="{{ $siteSetting->youtube_url }}" target="_blank" class="hover:text-red-500">
                        {{-- YouTube --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21.8 8s-.2-1.5-.8-2.2c-.8-.9-1.7-.9-2.1-1C16.3 4.5 12 4.5 12 4.5h-.1s-4.3 0-6.9.3c-.4.1-1.3.1-2.1 1C2.4 6.5 2.2 8 2.2 8S2 9.6 2 11.3v1.4C2 14.4 2.2 16 2.2 16s.2 1.5.8 2.2c.8.9 1.9.9 2.4 1 1.8.2 7.6.3 7.6.3s4.3 0 6.9-.3c.4-.1 1.3-.1 2.1-1 .6-.7.8-2.2.8-2.2s.2-1.6.2-3.3v-1.4c0-1.7-.2-3.3-.2-3.3zM9.8 14.6V9.4l5.6 2.6-5.6 2.6z"/>
                        </svg>
                    </a>
                @endif
                @if ($siteSetting->linkedin_url)
                    <a href="{{ $siteSetting->linkedin_url }}" target="_blank" class="hover:text-blue-500">
                        {{-- LinkedIn --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.98 3.5C4.98 4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8h4V24h-4V8zM8.5 8h3.6v2.2h.1c.5-.9 1.8-1.9 3.7-1.9 3.9 0 4.6 2.6 4.6 6v9.7h-4v-8.6c0-2.1 0-4.7-2.9-4.7-2.9 0-3.4 2.3-3.4 4.6V24h-4V8z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="mt-10 border-t border-white/10 pt-4 text-center text-white/70 text-sm">
        &copy; {{ date('Y') }} {{ $siteSetting->site_name ?? 'Website' }}. All rights reserved.
    </div>
</footer>

@endsection
