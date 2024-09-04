<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Part')</title>
    <script src="https://kit.fontawesome.com/7cc6867de3.js" crossorigin="anonymous"></script>    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="text-gray-900 bg-gray-100">
    <div class="flex flex-col min-h-screen">
        <header class="bg-gray-900 shadow">
            <div class="container flex items-center justify-between px-4 py-6 mx-auto">
                <h1 class="text-3xl font-bold text-white">Part!</h1>
                <div class="relative">
                    <button id="user-menu-button" class="flex items-center text-white focus:outline-none">
                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        <span class="ml-2">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="user-menu" class="absolute right-0 z-20 hidden w-48 py-1 mt-2 bg-white rounded-md shadow-lg">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">Sair</button>
                        </form>
                        <!-- Adicione mais opções aqui -->
                    </div>
                </div>
            </div>
        </header>
        
        
        <main class="container flex items-center justify-center flex-grow px-4 py-6 mx-auto">
            @yield('content')
        </main>

        <footer class="py-6 bg-white border-t">
            <div class="container mx-auto text-center text-gray-500">
                © 2024 Part. Todos os direitos reservados.
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');
    
            userMenuButton.addEventListener('click', function () {
                userMenu.classList.toggle('hidden');
            });
    
            document.addEventListener('click', function (event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        });
    </script>
    
    @livewireScripts
</body>
</html>
