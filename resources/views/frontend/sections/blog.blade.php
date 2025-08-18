<section id="blog" class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Judul Section --}}
        <div class="text-center mb-12">
            <span class="text-sm font-semibold bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 bg-clip-text text-transparent uppercase tracking-wider">
                Blog & Artikel
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mt-2">
                Insight & Berita Terbaru
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mt-3 max-w-2xl mx-auto">
                Dapatkan tips, berita, dan insight seputar teknologi, pengembangan aplikasi, dan tren industri.
            </p>
        </div>

        {{-- Cek Data --}}
        @if($blogs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        {{-- Thumbnail --}}
                        @if($blog->thumbnail)
                            <img src="{{ asset('storage/'.$blog->thumbnail) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 flex items-center justify-center text-white font-semibold">
                                No Image
                            </div>
                        @endif

                        {{-- Konten --}}
                        <div class="p-6">
                            {{-- Kategori --}}
                            @if($blog->category)
                                <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white">
                                    {{ $blog->category->name }}
                                </span>
                            @endif

                            {{-- Judul --}}
                            <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white line-clamp-2">
                                {{ $blog->title }}
                            </h3>

                            {{-- Ringkasan Konten --}}
                            <p class="mt-2 text-gray-600 dark:text-gray-300 text-sm line-clamp-3">
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                            </p>

                            {{-- Info Bawah --}}
                            <div class="mt-4 flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                <a href="{{ url('/blog/'.$blog->slug) }}" 
                                   class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                                    Baca Selengkapnya →
                                </a>
                                <span>{{ $blog->views_count }} views</span>
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
                        Belum ada artikel tersedia
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>
