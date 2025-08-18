<section id="home" class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20 relative overflow-hidden text-white">

    {{-- Optional subtle pattern overlay --}}
    <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-5 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-10">
        
        {{-- Left Side: CTA --}}
        <div>
            <h1 class="text-4xl font-bold mb-4 dark:text-white">
                {{ $siteSetting->headline }}
            </h1>
            <p class="text-lg dark:text-gray-300 mb-6">
                {{ $siteSetting->sub_headline }}
            </p>
            <a href="#portfolio" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-lg transition">
                Lihat Portofolio
            </a>
        </div>

        {{-- Right Side: Image Slider --}}
        <div 
            x-data="{
                active: 0,
                images: {{ $siteSetting->banners->pluck('image') }},
                init() {
                    setInterval(() => {
                        this.active = (this.active + 1) % this.images.length
                    }, 4000)
                }
            }" 
            class="relative overflow-hidden rounded-lg shadow-lg"
        >
            <template x-for="(image, index) in images" :key="index">
                <img 
                    x-show="active === index"  
                    x-transition:enter="transition-opacity ease-out duration-700"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    :src="'{{ asset('storage') }}/' + image" 
                    class="w-full h-80 object-cover" alt="Banner">
            </template>

            {{-- Prev/Next Buttons --}}
            <button @click="active = (active - 1 + images.length) % images.length"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 dark:bg-gray-800/80 p-2 rounded-full shadow hover:bg-white dark:hover:bg-gray-700">
                ‹
            </button>
            <button @click="active = (active + 1) % images.length"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 dark:bg-gray-800/80 p-2 rounded-full shadow hover:bg-white dark:hover:bg-gray-700">
                ›
            </button>

            {{-- Dots --}}
            <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-2">
                <template x-for="(image, index) in images" :key="index">
                    <div @click="active = index"
                        :class="{'bg-blue-600': active === index, 'bg-gray-400 dark:bg-gray-500': active !== index}"
                        class="w-3 h-3 rounded-full cursor-pointer"></div>
                </template>
            </div>
        </div>

    </div>

    
</section>