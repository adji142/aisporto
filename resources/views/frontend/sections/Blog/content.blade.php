<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($blog as $blg)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    @if($blg->thumbnail)
                        <img src="{{ asset('storage/' . $blg->thumbnail) }}" 
                             alt="{{ $blg->title }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/350x200" 
                             alt="{{ $blg->title }}" 
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $blg->title }}</h3>
                        <p class="text-gray-600 mb-4">{!! Str::limit($blg->content, 100) !!}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ $blg->link ?? url('/blog/'.$blg->slug) }}" 
                                class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                                Lihat Detail
                            </a>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $blg->views_count }} views
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada Blog yang tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $blog->links() }}
        </div>
    </div>
</section>