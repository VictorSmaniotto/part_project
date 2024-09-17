    <!-- Painel lateral -->
    <aside class="w-1/3 h-screen p-4 bg-white border-r rounded-lg shadow">
        <h2 class="py-2 text-2xl font-bold">{{ $project->title }}</h2>
        
        <div class="mt-4 mb-8">
            <h3 class="font-semibold text-gray-400">Descrição:</h3>
            <p class="mt-1 ml-1 text-gray-700">{{ $project->description }}</p>
        </div>

        <div class="mt-4">
            <h3 class="mb-2 font-semibold text-gray-400">Integrantes:</h3>
            @if($project->team)
                <ul class="list-none ">
                    @foreach($project->team->users as $user)
                        <li class="flex items-center mb-2">
                            <img class="w-8 h-8 mr-2 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            <span>{{ $user->name }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Este projeto não está associado a nenhuma equipe.</p>
            @endif
        </div>
        
        <div class="mt-4">
            <h3 class="mb-2 font-semibold text-gray-400">Professor Orientador:</h3>
            @if($project->professor)
                <div class="flex items-center">
                    <img class="w-8 h-8 mr-2 rounded-full" src="{{ $project->professor->profile_photo_url }}" alt="{{ $project->professor->name }}">
                    <span>{{ $project->professor->name }}</span>
                </div>
            @else
                <p>Este projeto não tem um professor orientador associado.</p>
            @endif
        </div>
        
        

        <div class="mt-4">
            <h3 class="font-semibold text-gray-400">Publicado em:</h3>
            <p>{{ $project->created_at ? $project->created_at->format('d/m/Y') : '' }}</p>
        </div>

        

        <div class="mt-4">
            <h3 class="mb-2 font-semibold text-gray-400">Comentários:</h3>
            <div class="h-40 space-y-2 overflow-y-auto">
                @foreach($comments as $comment)
                    <div class="p-2 mb-4 bg-gray-100 rounded shadow">
                        <div class="flex items-center mb-1">
                            <img class="w-5 h-5 mr-2 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{  $comment->user->name }}">
                            <span class="text-sm">{{ $comment->user->name  }}</span>
                        </div>
                        
                        <p class="ml-1 break-words">{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>
            

            <div class="flex flex-col justify-end">
                <textarea wire:model.defer="newComment" class="w-full p-4 mt-4 align-top bg-gray-100 resize-none focus:ring-0 sm:text-sm focus:outline-blue-500" placeholder="Adicione um comentário..."></textarea>
                <button wire:click="addComment" class="self-end w-16 p-2 mt-2 text-white bg-blue-900 rounded hover:bg-gray-600">Enviar</button>
            </div>    

        <div class="mt-4 ">
            <h3 class="mb-2 font-semibold text-gray-400">Curtidas:</h3>
            <a wire:click="likeProject" class="px-6 py-2 text-2xl text-red-600 rounded">
                @if ($project->likes->contains(Auth::user()))
                    <i class="fa-solid fa-heart"></i>
                @else
                    <i class="fa-regular fa-heart"></i>
                @endif
            </a>
            <span class="px-6 py-2 text-white bg-blue-500 rounded">{{ $likeCount }}</span>
        </div>

        @if(auth()->user()->role == 'professor')
            <div class="mt-4">
                <h3 class="font-semibold">Atribuir Nota:</h3>
                <input type="range" wire:model="rating" min="0" max="100" class="w-full mt-2">
                <p>Nota: {{ $rating }}</p>
            </div>
        @endif
    </aside>
    <script>
        Livewire.on('likeUpdated', likeCount => {
            @this.likeCount = likeCount;
        });
    </script>
   

