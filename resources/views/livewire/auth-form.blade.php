<div class="flex w-full max-w-4xl mx-auto bg-white rounded-lg shadow-md">
    <!-- Lado Esquerdo -->
    <div class="w-1/2 p-8 @if($isRegister) bg-white @else bg-gray-900 @endif flex flex-col justify-center text-white rounded-l-lg">
        @if ($isRegister)
            <h2 class="mb-4 text-2xl font-bold text-center text-gray-900">Registrar</h2>
            <form wire:submit.prevent='register' class="w-full">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input wire:model='name' type="text" name="name" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input wire:model='email' type="text" name="email" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Senha</label>
                    <input wire:model='password' type="password" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Confirme sua senha</label>
                    <input wire:model='password_confirmation' type="password" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('password_confirmation')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-blue-700">Registrar</button>
            </form>
        @else
            <h2 class="mb-4 text-2xl font-bold text-center">Bem Vindo(a)!</h2>
            <p class="text-center">Ainda não tem uma conta? <strong>Registre-se agora.</strong></p>
            <div class="flex justify-center">
                <button wire:click="toggleForm" class="px-6 py-2 mt-4 text-sm font-semibold text-gray-900 bg-gray-300 rounded-lg hover:bg-blue-900 hover:text-white">Registrar</button>
            </div>
        @endif
    </div>
    <!-- Lado Direito -->
    <div class="w-1/2 p-8 @if($isRegister) bg-gray-900 @else bg-white @endif flex flex-col justify-center text-white rounded-r-lg">
        <h2 class="text-2xl font-bold mb-4 text-center  @if(!$isRegister) text-gray-900 @else text-white @endif">Login</h2>
        @if ($isRegister)
            <p class="text-center">Já possui uma conta? <strong>Faça login.</strong></p>
            <div class="flex justify-center">
                <button wire:click="toggleForm" class="px-6 py-2 mt-4 text-sm font-semibold text-gray-900 bg-gray-300 rounded-lg hover:bg-blue-900 hover:text-white">Login</button>
            </div>
        @else
            <form wire:submit.prevent='login' class="w-full">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model='email' type="email" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Senha</label>
                    <input wire:model='password' type="password" class="w-full p-1 mt-1 text-gray-900 border border-gray-300 rounded" required>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="px-4 py-2 mt-4 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-700">Login</button>
            </form>
        @endif
    </div>
</div>
