
@if($highlight)
<section id="highlight-product" 
    {{-- Pilih salah satu warna di bawah --}}
    {{-- 1. Biru elegan --}}
    class="relative bg-gradient-to-br from-blue-50 via-white to-blue-200 
           dark:from-blue-900 dark:via-gray-950 dark:to-blue-900 py-20"

    {{-- 2. Gold Premium --}}
    {{-- class="relative bg-gradient-to-br from-yellow-50 via-white to-amber-200 
           dark:from-yellow-900 dark:via-gray-950 dark:to-amber-900 py-20" --}}

    {{-- 3. Hijau segar --}}
    {{-- class="relative bg-gradient-to-br from-green-50 via-white to-emerald-100 
           dark:from-green-900 dark:via-gray-950 dark:to-emerald-900 py-20" --}}
>

    {{-- Optional pattern overlay --}}
    <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-5 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center relative z-10">

        {{-- Left: CTA --}}
        <div data-aos="fade-right">
            <span class="inline-block text-sm font-medium text-blue-600 dark:text-blue-400 mb-2">
                Produk Unggulan
            </span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900 dark:text-white leading-tight">
                {{ $highlight->title }}
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 max-w-lg">
                {{ $highlight->short_description }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ url('/product/'.$highlight->slug) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-lg transition">
                    Lihat Detail
                </a>
                <a href="#contact" 
                   class="bg-blue-50 hover:bg-blue-100 text-blue-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 px-6 py-3 rounded-lg shadow-lg transition">
                    Hubungi Kami
                </a>
            </div>
        </div>

        {{-- Right: Product Card --}}
        <div class="flex justify-center" data-aos="fade-left">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 rounded-xl shadow-lg overflow-hidden max-w-sm w-full transform hover:scale-[1.02] transition duration-300">
                @if($highlight->image)
                    <img src="{{ asset('storage/'.$highlight->image) }}" 
                         alt="{{ $highlight->title }}" 
                         class="w-full h-64 object-cover">
                @else
                    <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif
                <div class="p-5">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $highlight->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        {!! Str::limit($highlight->description, 80) !!}
                    </p>
                    @if($highlight->price)
                        <p class="mt-4 text-lg font-bold text-blue-600 dark:text-blue-400">
                            Rp {{ number_format($highlight->price, 0, ',', '.') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
@endif

