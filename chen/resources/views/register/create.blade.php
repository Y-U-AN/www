<x-layout>
    <style>
        body {
            background-color: rgb(124, 64, 64);;
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

    <section class="px-6 py-8 comment-container">
        <main class="max-w-lg mx-auto mt-10 l">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Sign In!</h1>
                
                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-black-700"
                                for="name"
                        >
                            Name
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                        >

                        @error('name')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-black-700"
                            for="username"
                        >
                            Username
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                                type="text"
                                name="username"
                                id="username"
                                value="{{ old('username') }}"
                                required
                        >

                        @error('username')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-black-700"
                                for="email"
                        >
                            Email
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                        >


                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-black-700"
                                for="password"
                        >
        
                            Password
                        </label>
        
                        <input class="border border-gray-400 p-2 w-full"
                                type="password"
                                name="password"
                                id="password"
                                required
                        >    
                        

                        @error('password')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div> 

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Submit
                        </button>
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li class="text-red-600 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </x-panel>
        </main>
    </section>


    <footer class="text-center text-gray-600 text-sm">
        <p class="mb-2">© 2023 My Website</p>
        <p>
            Designed by <a href="#" class="text-blue-500 hover:underline">Mingyuan Chen</a>
        </p>
    </footer>
</x-layout> 