<x-layout>
    <link rel="stylesheet" href="/app.css"> 
    <style>
        body {
            background-color: rgb(124, 64, 64);
            color: white;
        }

        .container {
            border: 4px solid #fff; 
            border-radius: 10px; 
            padding: 20px; 
        }



        footer {
            background-color: white;
        }
    </style>

    <div class="container mx-auto">

        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 bg-white-500">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Just Find"
                        class="bg-transparent placeholder-black font-semibold text-black" style="black">
            </form>
        </div>

        @foreach ($index as $post)
            <article class="my-6">
                <h1 class="text-2xl font-semibold">
                    <a href="/index/{{ $post->slug }}"> 
                        {!! $post->title !!}                  
                    </a>
                </h1 class="one">
                <p class="text-gray-600 text-sm">
                    <span class="author">
                        By <a href="/authors/{{ optional($post->author)->username }}">{{ optional($post->author)->name }}</a>
                    </span>
                    <span class="category ml-2">
                        in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </span>
                </p>
                
                @if ($post->thumbnail)
                    <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="Thumbnail" class="rounded-xl" width='100'>
                @endif

                <div class="mt-2">
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach 
    </div>
    <footer class="text-center text-gray-600 text-sm">
        <p class="mb-2">© 2023 My Website.</p>
        <p>
            Designed by <a href="#" class="text-blue-500 hover:underline">Mingyuan Chen</a>
        </p>
    </footer>
</x-layout>



















