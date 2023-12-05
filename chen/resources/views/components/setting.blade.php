@props(['heading'])
<style>
    body {
        background-color: rgb(124, 64, 64);;
    }

    .dropdown-content {
        display: none;
    }

    .container {
        border: 4px solid #fff; 
        border-radius: 10px; 
        padding: 20px; 
    }

    .dropdown-content.show {
        display: block;
    }
    </style>

<section class="py-8 max-w-4xl mx-auto">
    

    <div class="container mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            {{$heading}}
        </h1>
        <aside>
           
        
            <div class="dropdown">
                <button class="rounded-full dropdown-btn" class="text-white-500">
                    Links
                </button>
                <ul class="dropdown-content">
                    <li>
                        <button onclick="location.href='/admin/posts';" class="text-red-500"> 
                            All Posts
                        </button>
                    </li>
                    <li>
                        <button onclick="location.href='/admin/posts/create';" class="text-b-500">
                            New Post
                        </button>
                    </li>
                </ul>
            </div>
        
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const dropdownBtn = document.querySelector('.dropdown-btn');
                    const dropdownContent = document.querySelector('.dropdown-content');
        
                    dropdownBtn.addEventListener('click', function() {
                        dropdownContent.classList.toggle('show');
                    });
        
                    // 点击菜单外部时关闭下拉菜单
                    window.onclick = function(event) {
                        if (!event.target.matches('.dropdown-btn')) {
                            const dropdowns = document.getElementsByClassName('dropdown-content');
                            for (let i = 0; i < dropdowns.length; i++) {
                                const openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    }
                });
            </script>
        </aside>
        
    
        <main>
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
