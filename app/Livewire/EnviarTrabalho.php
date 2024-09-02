<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EnviarTrabalho extends Component
{
    use WithFileUploads;

    public $titulo;
    public $arquivo;

    public function salvarTrabalho()
    {
        $this->validate([
            'titulo'=>'required|string|max:255',
            'arquivo'=>'required|mimes:pdf|max:10240'
        ]);

        $path = $this->arquivo->store('projects', 'public');

        auth()->user()->User::projects()->create([
            'titulo' => $this->titulo,
            'archive_path' => $path,
        ]);

        session()->flash('message','Projeto enviado com sucesso!');
    }

    public function render()
    {
        return view('livewire.enviar-trabalho');
    }
}
