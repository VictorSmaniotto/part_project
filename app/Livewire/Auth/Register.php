<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        User::create([
          'name' => $this->name,
          'email' => $this->email,
          'password' => Hash::make($this->password),
        ]);

        return redirect()->route('login')->with('success','Usuário cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
