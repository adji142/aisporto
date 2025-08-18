<section id="services" class="relative bg-gradient-to-b from-gray-100 via-white to-gray-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
            Layanan Kami
        </h2>
        <p class="text-gray-600 dark:text-gray-300 mb-10 max-w-2xl mx-auto">
            Kami menyediakan berbagai layanan teknologi untuk mendukung perkembangan bisnis Anda.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition duration-300 p-6">
                    {{-- Icon --}}
                    <div class="w-14 h-14 mx-auto flex items-center justify-center bg-blue-100 dark:bg-blue-900 rounded-full mb-4">
                        @if($service->icon_type === 'emoji')
                            <span class="text-2xl">{{ $service->icon }}</span>

                        @elseif($service->icon_type === 'icon')
                            @if(Str::startsWith($service->icon, 'heroicon-'))
                                @svg($service->icon, 'w-8 h-8 text-blue-600 dark:text-blue-400')
                            @else
                                @php
                                    $iconName = Str::startsWith($service->icon, 'lucide-')
                                        ? Str::after($service->icon, 'lucide-')
                                        : $service->icon;
                                @endphp
                                <i data-lucide="{{ $iconName }}" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                            @endif

                        @elseif($service->icon_type === 'image')
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->name }}" class="w-8 h-8 object-contain">
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
                        {{ $service->title }}
                    </h3>

                    {{-- Short Description --}}
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        {{ $service->summary }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
