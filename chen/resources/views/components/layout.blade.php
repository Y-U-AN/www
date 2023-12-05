<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
</head>
<body style="font-family: 'Open Sans', sans-serif;">

    <header>
        <nav class="md:flex md:justify-between md:items-center px-6 py-4 bg-gray-100">
            {{-- Your header content --}}
            <div class="mt-8 md:mt-0 flex items-center">
                @auth 
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase" style="color: black;"> Welcome, {{ auth()->user()->name }}!</button>
                        </x-slot>
                        
                        @admin
                            <x-dropdown-item href="/" :active="request()->is('posts')" style="color: black;">Home Page</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts" :class="request()->is('admin/posts') ? 'active' : ''" style="color: black;">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')" style="color: black;">New Post</x-dropdown-item>
                        @endadmin

                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()" style="color: black;">Log Out</x-dropdown-item>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                            {{-- <button type="submit">Log Out</button> --}}
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register" class="text-xs font-bold uppercase" style="color: black;">Sign In</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase" style="color: black;">Log In</a>
                @endauth
            </div>
        </nav>
    </header>

    <section class="px-6 py-8">
        {{$slot}}
    </section>

    @if (session()->has('success'))
        <div class="bg-blue-500 bottom-0 bottom-10 fixed px-4 py-2 right-0 text-white"
             x-data="{show:true}"
             x-show="show"
             x-init="setTimeout(()=>show = false, 4000)"
        >
            <p>{{ session('success') }}</p>
        </div>
    @endif

</body>
</html>
