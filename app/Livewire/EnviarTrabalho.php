<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\User;
use App\Models\Course;
use App\Models\Project;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EnviarTrabalho extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $file;
    public $course_id;
    public $project_type = 'Projeto Integrador';
    public $professor_id;
    public $team_members = []; // IDs dos membros da equipe


    // public function mount()
    // {
    //     $this->professor_id = auth()->user()->id; //se o usuário logado for professor
    // }
    protected $listeners = ['teamMembersUpdated'];

    public function teamMembersUpdated($selectedUsersDetails)
    {
        \Illuminate\Support\Facades\Log::info('Details Selected Users: ', $selectedUsersDetails);

        $this->team_members = array_map(fn($user) => $user['id'], $selectedUsersDetails);

        \Illuminate\Support\Facades\Log::info('Deve ter só IDs: ', $this->team_members);
    }

    public function salvarTrabalho()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'required|exists:users,id',
            'team_members' => 'required|array|min:1',
            'team_members.*' => 'exists:users,id',
        ]);



        $filePath = $this->file ? $this->file->store('projects', 'public') : null;

        $project = Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $filePath,
            'course_id' => $this->course_id,
            'professor_id' => $this->professor_id,
            'project_type' => $this->project_type,
        ]);

        $team = Team::create();
        $team->users()->attach($this->team_members);

        $project->team_id = $team->id;
        $project->save();

        session()->flash('message', 'Projeto enviado com sucesso!');
        $this->reset(); //limpa os campos após envio

        // Dispara o evento para resetar os campos do SelectTeamMember
        $this->dispatch('resetTeamMembers');
    }

    public function render()
    {
        return view('livewire.enviar-trabalho', [
            'courses' => Course::all(),
            'professores' => User::where('role', 'professor')->get(), // Pega todos os professores
            'users' => User::where('role', 'aluno')->get(),
        ]);
    }
}
