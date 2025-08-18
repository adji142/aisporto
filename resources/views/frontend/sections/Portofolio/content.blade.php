<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    @if($portfolio->thumbnail)
                        <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" 
                             alt="{{ $portfolio->title }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/350x200" 
                             alt="{{ $portfolio->title }}" 
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $portfolio->title }}</h3>
                        <p class="text-gray-600 mb-4">{!! Str::limit($portfolio->description, 100) !!}</p>
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
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada portfolio yang tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $portfolios->links() }}
        </div>
    </div>
</section>