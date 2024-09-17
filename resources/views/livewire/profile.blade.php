<div x-show="open" class="fixed inset-0 z-30 flex justify-end" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-full">
    <div @click.away="open = false" class="relative flex flex-col h-full bg-white shadow-xl w-96">
        <div class="flex items-center justify-between p-6 bg-gray-900">
            <div class="m-auto text-center text-white">
                <img class="m-auto rounded-full w-14 h-14" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                <h2 class="mt-2 text-lg font-semibold">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
            </div>
            {{-- <button @click="open = false" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button> --}}
        </div>
        <div class="flex-1 p-4 overflow-y-auto">
            <!-- Menu Items -->
            <nav class="space-y-6">
                <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-file-alt"></i>
                    <span>Publicações</span>
                </a>
                <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-heart"></i>
                    <span>Avaliações</span>
                </a>
                <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-book"></i>
                    <span>Tec. Desenvolvimento de Sistemas</span>
                </a>
                <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-book"></i>
                    <span>Tec. Contabilidade</span>
                </a>
                <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fa-regular fa-id-card"></i>
                    <span>Meus Dados</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </button>
                </form>
            </nav>

            <a href="{{ route('projects.add') }}" class="fixed p-4 text-white bg-gray-900 rounded-full shadow-lg bottom-4 right-4 hover:bg-blue-700">
                <i class="fas fa-plus"></i>
            </a>

        </div>
    </div>
<!-- Backdrop -->
{{-- <div class="fixed inset-0 z-0 bg-black opacity-50" @click="open = false"></div> --}}
    
</div>