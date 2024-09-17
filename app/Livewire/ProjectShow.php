<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProjectShow extends Component
{

    public $project, $comments, $newComment, $rating, $projectId, $likeCount;

    protected $listeners = ["commentAdded" => "updateComments"];

    public function mount($projectId)
    {

        $this->projectId = $projectId;
        $this->project = $this->project = Project::with('users', 'likes')->findOrFail($projectId);
        $this->comments = $this->project->comments()->latest()->take(10)->get();
        $this->likeCount = $this->project->likes()->count();
    }

    public function likeProject()
    {
        // $this->project->likes()->toggle(auth()->user()->id);
        // $this->project = Project::with('users', 'likes')->findOrFail($this->project->id);
        $user = auth()->user();
        $project = $this->project;

        if ($project->likes->contains($user)) {
            $project->likes()->detach($user->id);
        } else {
            $project->likes()->attach($user->id);
        }

        // Atualiza o projeto para refletir as mudanças
        $this->project = Project::with('users', 'likes')->findOrFail($this->project->id);
        $this->likeCount = $this->project->likes->count();

        $this->dispatch('likeUpdated', $this->likeCount);
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:255',
        ]);

        Comment::create([
            'content' => $this->newComment,
            'project_id' => $this->project->id,
            'user_id' => auth()->user()->id,
        ]);

        $this->newComment = '';
        $this->dispatch('commentAdded');
        // $this->comments = $this->project->comments->latest()->take(10)->get();
    }

    public function updateComments()
    {
        $this->comments = $this->project->comments()->latest()->take(10)->get();
    }

    public function updateRating($value)
    {
        if (auth()->user()->role == 'professor') {
            $this->project->rating = $value;
            $this->project->save();
        }
    }

    public function render()
    {
        $project = Project::findOrFail($this->projectId);

        return view('livewire.project-show', compact('project'));
    }
}
