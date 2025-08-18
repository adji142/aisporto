<section 
    class="relative bg-cover bg-center bg-no-repeat" 
    style="background-image: url('https://wallpapers.com/images/featured/information-technology-background-yj5lntx9lzio3yiz.jpg');"
>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-indigo-900/70"></div>
    <div class="relative container mx-auto px-4 py-12 text-white">
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="list-reset flex space-x-2">
                <li>
                    <a href="{{ url('/') }}" class="hover:underline">Home</a>
                </li>
                <li>/</li>
                <li>
                    <a href="{{ route('blog') }}" class="hover:underline">Blog</a>
                </li>
                <li>/</li>
                <li class="text-gray-200">{{ $blog->title }}</li>
            </ol>
        </nav>
        <h1 class="text-4xl font-bold">{{ $blog->title }}</h1>
    </div>
</section>