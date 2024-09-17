<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Part')</title>
    <script src="https://kit.fontawesome.com/7cc6867de3.js" crossorigin="anonymous"></script> @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen text-gray-900 bg-gray-100 container-fluid">
    <div x-data="{ open: false }">
        <header class="bg-gray-900 shadow">
            <div class="container flex items-center justify-between px-4 py-6 mx-auto">
                <h1 class="text-3xl font-bold text-white">Part!</h1>
                <button @click="open = true" class="flex items-center text-white focus:outline-none">
                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    <span class="ml-2">{{ Auth::user()->name }}</span>
                </button>
            </div>
        </header>

       
    
        <!-- Drawer -->
       <livewire:profile />

        
    </div>
    

        <main class="flex items-center justify-center flex-grow w-full px-4 py-6 mx-auto">
            @yield('content')
        </main>

        <footer class="py-6 bg-white border-t">
            <div class="container mx-auto text-center text-gray-500">
                © 2024 Part. Todos os direitos reservados.
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            userMenuButton.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        });
    </script>

    @livewireScripts
</body>

</html>
