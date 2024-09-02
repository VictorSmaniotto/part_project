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
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-gray-900 shadow">
            <div class="container mx-auto py-6 px-4 flex justify-between">
                <h1 class="text-3xl font-bold text-white">Part!</h1>
             
            </div>
           
            
        </header>
        <main class="flex-grow container mx-auto py-6 px-4 flex items-center justify-center">
            {{ $slot }}
        </main>

        <footer class="bg-white border-t py-6">
            <div class="container mx-auto text-center text-gray-500">
                © 2024 Part. Todos os direitos reservados.
            </div>
        </footer>
    </div>

    @livewireScripts
</body>
</html>
