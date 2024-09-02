<div class="w-full max-w-2xl mx-auto bg-white border-gray-200 rounded-lg shadow-sm mb-4 max-h-96 overflow-y-auto">
    <div class="p-4">
        {{-- Header --}}
       {{-- Header --}}
       <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img src="#" alt="#" class="w-10 h-10 rounded-full">
            <div class="ml-3">
                <h2 class="text-sm font-semibold">Victor Smaniotto</h2>
                <p class="text-xs text-gray-500">01/09/2024 21:15</p>
            </div>
        </div>
        <button class="text-blue-500 hover:text-blue-600 flex items-center">
            <i class="fas fa-bookmark"></i>
        </button>
    </div>
        {{-- Descrição --}}
        <div class="mt-4">
            <p class="text-gray-700">descrição do projeto que alguem escreveu</p>
        </div>

        {{-- imagem se tiver --}}
        {{-- @if () --}}
        <div class="mt-4">
            <img src="#" alt="#" class="rounded-lg max-h-40 w-full object-cover">
        </div>
        {{-- @endif --}}

        {{-- Abrir projeto --}}
        <div class="mt-4">
            <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 focus:outline-none">
                <i class="fas fa-external-link-alt"></i>
                <span class="ml-2">Acessar Projeto</span>
            </a>
        </div>
    </div>

    {{-- footer --}}
    <div class="flex justify-end items-center px-4 py-2 border-t border-gray-200 text-sm text-gray-600 space-x-4">
        <button class="flex items-center space-x-2 hover:text-blue-500 focus:outline-none p-2 text-lg">
            <i class="fa-solid fa-heart"></i>
        </button>
        <button class="flex items-center space-x-2 hover:text-blue-500 focus:outline-none p-2 text-lg">
            <i class="fas fa-comment"></i>
        </button>
        <button class="flex items-center space-x-2 hover:text-blue-500 focus:outline-none p-2 text-lg">
            <i class="fas fa-share"></i>
        </button>
    </div>
</div>