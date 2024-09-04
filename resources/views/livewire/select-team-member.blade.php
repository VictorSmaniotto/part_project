<div class="mb-4">
    <!-- Campo de Busca -->
    <div>
        <label for="search" class="block text-sm font-medium text-gray-700">Buscar Integrantes:</label>
        <input type="text" wire:model.live="search" id="search"
            class="block w-full p-2 mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
            placeholder="Digite o nome do integrante">
    </div>

    <!-- Lista de Usuários Filtrados -->
    @if(!empty($users))
    <div class="mt-2 overflow-y-auto max-h-40">
        @foreach($users as $user)
            <div 
                class="flex items-center justify-between p-2 bg-white border-b border-gray-200 cursor-pointer hover:bg-gray-100" 
                wire:click="addUser({{ $user->id }})">
                <span>{{ $user->name }}</span>
                @if(in_array($user->id, $selectedUsers))
                    <span class="text-green-500">Selecionado</span>
                @endif
            </div>
        @endforeach
    </div>
@endif

    <!-- Usuários Selecionados -->
    @if(!empty($selectedUsersDetails))
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Integrantes Selecionados:</label>
            @foreach($selectedUsersDetails as $user)
                <div class="flex items-center justify-between p-2 mt-2 bg-green-100 border border-green-300 rounded-md">
                    <!-- Busca o usuário manualmente no array -->
                    <span> {{ $user->name }}</span>
                    <button 
                        type="button" 
                        class="text-red-500 hover:text-red-700" 
                        wire:click="removeUser({{ $user->id}})"
                    >
                        Remover
                    </button>
                </div>
            @endforeach
        </div>
    @endif

    <input type="hidden" name="team_members" value="{{ implode(',', $selectedUsers) }}">
</div>
