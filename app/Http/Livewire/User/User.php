<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\User as UserModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class User extends Component
{
    use AuthorizesRequests;

    public $users;
    public $itemUser;

    public $user;

    public $name;
    public $email;
    public $role;

    public $deleteModalVisibility;
    public $editModalVisibility;

    public function hydrate()
    {
        $this->resetErrorBag();
    }

    public function showEditModal(Int $userId)
    {
        $this->loadUser($userId);
        $this->authorize('update', $this->user);
        $this->editModalVisibility = true;
    }

    public function updateUser()
    {
        $this->authorize('update', $this->user);
        $userAccessLevel = auth()->user()->role;

        $this->validate([
            'name' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('users')->ignore($this->user->id),
            ],
            'email' => [
                'required', 
                'email', 
                'max:255', 
                Rule::unique('users')->ignore($this->user->id),
            ],
            'role' => [
                'numeric',
                'min:'.$userAccessLevel,
            ]
        ], [
            'role.min' => 'You dont have permissions for that.',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->role = $this->role;
        $this->user->save();
        $this->editModalVisibility = false;

        session()->flash('success', 'User data saved.');
        
    }

    public function showDeleteModal(Int $userId): void
    {
        $this->loadUser($userId);
        $this->authorize('delete', $this->user);
        $this->deleteModalVisibility = true;

    }

    public function deleteUser(): void
    {
        $this->authorize('delete', $this->user);
        $this->user->delete();
        $this->deleteModalVisibility = false;
        session()->flash('success', 'User deleted.');
        $this->reset();
    }

    public function loadUser($userId): void
    {
        $user = UserModel::findOrFail($userId);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;

    }

    public function loadUsers(): void
    {
        $this->users = UserModel::where('id', '!=', '1')->get();
    }

    public function render(): View
    {
        return view('livewire.user.user', [
            'users' => $this->loadUsers(),
        ]);
    }
}
