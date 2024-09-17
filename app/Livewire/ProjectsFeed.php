<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectsFeed extends Component
{

    public $projects;

    public function mount(Project $projects)
    {
        $this->projects = $projects->all();
    }

    public function render()
    {
        return view('livewire.projects-feed', [
            'projects' => $this->projects
        ]);
    }
}
