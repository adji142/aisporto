<section id="portfolio" class="relative bg-gradient-to-b from-gray-100 via-white to-gray-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 py-16">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Judul Section --}}
        <div class="text-center mb-12">
            <span class="text-sm font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">
                Portofolio
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mt-2">
                Proyek Terbaru Kami
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mt-3 max-w-2xl mx-auto">
                Beberapa karya yang telah kami selesaikan untuk berbagai klien.
            </p>
        </div>

        {{-- Cek data --}}
        @if($portfolios->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolios as $portfolio)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        {{-- Thumbnail --}}
                        @if($portfolio->thumbnail)
                            <img src="{{ asset('storage/'.$portfolio->thumbnail) }}" 
                                alt="{{ $portfolio->title }}" 
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                                No Image
                            </div>
                        @endif

                        {{-- Konten --}}
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $portfolio->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                {!! Str::limit($portfolio->description, 80) !!}
                            </p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ $portfolio->link ?? url('/portfolio/'.$portfolio->slug) }}" 
                                   class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                                    Lihat Detail
                                </a>
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $portfolio->views_count }} views
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Jika kosong --}}
            <div class="flex justify-center">
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-10 shadow text-center">
                    <p class="text-gray-600 dark:text-gray-300 text-lg">
                        Portofolio belum tersedia
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>