{{-- @extends('layout') --}}
<x-layout>
    <style>
        body {
            background-color: rgb(124, 64, 64);;
            color: white;
        }

        .comment-container {
            border: 2px solid #fff; 
            border-radius: 8px; 
            padding:40px; 
            font-weight: bold;
        }
     
        footer {
            background-color: white;
        }
        
    </style>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <article class="comment-container">
            <h1 class="text-3xl font-bold mb-4">{!! $post->title !!}</h1>

            <p class="text-sm text-gray-600 mb-4">
                By <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:underline">{{ $post->author->name }}</a> in
                <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
            </p>

            <div class="mb-8">
                {!! $post->body !!}
            </div>

            @if ($post->thumbnail)
                <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="Thumbnail" class="rounded-xl" width='100'>
            @endif
        </article>

        <hr class="my-8 border-t-2 border-gray-300">

        <section class="col-span-8 col-start-5 mt-10 space-y-6">
            @foreach ($post->comments as $comment)
            @props(['comment'])

            <article class="flex">
                <div>
                    <img src="https://i.pravatar.cc/100" alt="" width="60" height="60">
                </div>       

                <div>
                    <header>
                        <h3 class="font-blod">{{$comment->author->username}}</h3>
            
                        <p class="text-xs">
                            Posted
                            <time>{{$comment->created_at}}</time>
                        </p>
                    </header>
            
            
                    <p>
                        {{$comment->body}}
                    </p>
                </div>
            </article>
            
            @endforeach

        </section>
        
        <hr class="my-8 border-t-2 border-gray-300">

        <footer class="text-center text-gray-600 text-sm">
            <p class="mb-2">© 2023 My Website</p>
            <p>
                Designed by <a href="#" class="text-blue-500 hover:underline">Mingyuan Chen</a>
            </p>
        </footer>
    </div> 
</x-layout>

