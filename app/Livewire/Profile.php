<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Profile extends Component
{

    public $user, $projetos;

    public function mount()
    {
        $this->user = auth()->user();
        $this->projetos = $this->user->projects;
    }

    // Criar uma função para listar os projetos do usuário autenticado
    public function projetos()
    {
       $projetos = Project::all();
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
