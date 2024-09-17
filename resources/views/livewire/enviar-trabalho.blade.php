<div class="flex w-full max-w-4xl min-w-full p-8 mx-auto bg-white rounded-lg shadow-md">

    <form wire:submit.prevent='salvarTrabalho' class="w-full"  aria-labelledby="form-title">
        @if (session('message'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg max-h-6 bg-green-50"
                role="alert">
                <span class="font-medium">Parabéns! 🎉 {{ session('message') }}</span>
            </div>
            
        @endif
        @csrf
        <div class="mb-4">

            <label for="title" class="block text-sm font-medium text-gray-700">Título do Projeto:</label>
            <input wire:model='title' type="text" name="title" id="title"
                class="block w-full p-2 mt-2 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                required placeholder="Escreva o título do projeto..." aria-required='true'>
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descrição:</label>
            <textarea wire:model="description" id="description" name="description"
                class="block w-full p-2 mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                placeholder="Escreva uma introdução sobre seu projeto..." aria-required='true'></textarea>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Curso, Tipo do Projeto e Professor na mesma linha -->

        <div class="flex mb-6 space-x-4">
            <div class="flex-1">
                <label for="course_id" class="block text-sm font-medium text-gray-700">Curso:</label>
                <select wire:model="course_id" id="course_id" name="course_id"
                    class="block w-full p-2 mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required aria-required='true'>
                    <option value="">Selecione um curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-1">
                <label for="project_type" class="block text-sm font-medium text-gray-700">Tipo:</label>
                <select wire:model="project_type" id="project_type" name="project_type"
                    class="block w-full p-2 mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required aria-required='true'>
                    <option value="TCC">TCC</option>
                    <option value="Projeto Integrador">Projeto Integrador</option>
                    <option value="Pesquisa">Pesquisa</option>
                    <option value="Seminário">Seminário</option>
                    <option value="Voluntário">Voluntário</option>
                </select>
                @error('project_type')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex-1">
                <label for="professor_id" class="block text-sm font-medium text-gray-700">Orientador:</label>
                <select wire:model="professor_id" id="professor_id" name="professor_id"
                    class="block w-full p-2 mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required aria-required='true'>
                    <option value="">Selecione um professor</option>
                    @foreach ($professores as $professor)
                        <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                    @endforeach
                </select>
                @error('professor_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>



        <!-- Componente de Seleção de Integrantes -->
        <livewire:select-team-member :selectedUsersDetails="$team_members" />





        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Arquivo do Projeto</label>
            <input type="file" wire:model="file" id="file" name="file"
                class="block w-full p-2 mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100" aria-required='true'>
            @error('file')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div wire:loading wire:target="salvarTrabalho" class="text-blue-500">
            Publicando...
        </div>

        <!-- Botão centralizado e verde -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="px-4 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">
                <i class="mr-2 fa-solid fa-upload"></i>
                Publicar Projeto
            </button>
        </div>

        {{-- @if (session()->has('message'))
            <div class="mt-4 text-center text-green-500">{{ session('message') }}</div>
        @endif --}}
    </form>

</div>
