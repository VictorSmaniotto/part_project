<?php

namespace App\Livewire;

use Log;
use App\Models\User;
use Livewire\Component;

class SelectTeamMember extends Component
{
    public $selectedUsers = [];
    public $users;
    public $search = '';
    public $selectedUsersDetails = [];

    protected $listeners = ['resetTeamMembers'];

    public function mount($selectedUsers = [])
    {
        $this->selectedUsers = $selectedUsers;
        $this->users = collect(); // Inicializa como uma coleção vazia
    }

    public function updatedSearch()
    {
        if ($this->search !== '') {
            $this->users = User::where('role', 'aluno')
                ->where('name', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->resetSearch();
        }
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->users = collect(); // Limpa a lista de usuários
    }

    public function addUser($userId)
    {
        if (!in_array($userId, $this->selectedUsers)) {
            $this->selectedUsers[] = $userId;
            $this->selectedUsersDetails[] = User::find($userId);
        }

        \Illuminate\Support\Facades\Log::info('Selected Users: ', $this->selectedUsers);
        \Illuminate\Support\Facades\Log::info('Selected Users Details: ', $this->selectedUsersDetails);


        $this->dispatch('teamMembersUpdated', $this->selectedUsersDetails);
    }

    public function removeUser($userId)
    {
        $this->selectedUsers = array_filter($this->selectedUsers, fn($id) => $id != $userId);
        $this->selectedUsersDetails = array_filter($this->selectedUsersDetails, fn($user) => $user->id != $userId);

        \Illuminate\Support\Facades\Log::info('Remove Selected Users: ', $this->selectedUsers);
        \Illuminate\Support\Facades\Log::info('Remove Selected Users Details: ', $this->selectedUsersDetails);
        $this->dispatch('teamMembersUpdated', $this->selectedUsersDetails);
    }

    public function render()
    {
        return view('livewire.select-team-member');
    }

    public function resetFields()
    {
        $this->selectedUsers = [];
        $this->selectedUsersDetails = [];
        $this->search = '';
        $this->users = collect();
    }

    public function resetTeamMembers()
    {
        $this->resetFields();
    }
}
