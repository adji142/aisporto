<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSetting->site_title ?? 'My Website' }}</title>
    <meta name="description" content="{{ $siteSetting->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $siteSetting->meta_tag ?? '' }}">
    @if(!empty($siteSetting->favicon))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @endif
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSetting->site_title ?? 'My Website' }}</title>
    <meta name="description" content="{{ $siteSetting->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $siteSetting->meta_tag ?? '' }}">
    @if(!empty($siteSetting->favicon))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @endif
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fslightbox/index.css">
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">


    {{-- HEADER --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2 text-xl font-bold text-blue-600">
                <img src="{{ asset('storage/' . ($siteSetting->favicon ?? '')) }}" alt="Logo" class="h-8 w-8">
                {{ $siteSetting->meta_title ?? 'AIS SYSTEM' }}
            </a>

            {{-- Navigation --}}
            <nav class="hidden md:flex gap-6">
                <a href="#home" class="hover:text-blue-600">Home</a>
                <a href="{{ route('portfolio') }}" class="hover:text-blue-600">Portfolio</a>
                <a href="{{ route('blog') }}" class="hover:text-blue-600">Blog</a>
                <a href="#product" id="product-link-desktop" class="hover:text-blue-600">Product</a>
                <a href="#contact" class="hover:text-blue-600">Contact</a>
            </nav>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenu = !mobileMenu" x-data="{ mobileMenu: false }" class="md:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                {{-- Mobile Menu --}}
                <div x-show="mobileMenu" class="absolute top-16 left-0 w-full bg-white shadow-md md:hidden">
                    <a href="#home" class="block px-4 py-2 hover:bg-gray-100">Home</a>
                    <a href="#portfolio" class="block px-4 py-2 hover:bg-gray-100">Portfolio</a>
                    <a href="{{ route('blog') }}" class="block px-4 py-2 hover:bg-gray-100">Blog</a>
                    <a href="#product" id="product-link-mobile" class="block px-4 py-2 hover:bg-gray-100">Product</a>
                    <a href="#contact" class="block px-4 py-2 hover:bg-gray-100">Contact</a>
                </div>
            </button>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    lucide.createIcons();

    function showDevAlert(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Informasi',
            text: 'Fitur sedang di kembangkan',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    const desktopLink = document.getElementById('product-link-desktop');
    if (desktopLink) {
        desktopLink.addEventListener('click', showDevAlert);
    }

    const mobileLink = document.getElementById('product-link-mobile');
    if (mobileLink) {
        mobileLink.addEventListener('click', showDevAlert);
    }
</script>
</html>

