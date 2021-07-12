<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;

    public $user;
    public $confirmingUserDelete = false;

    public function confirmUserDelete() {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-user');
        $this->confirmingUserDelete = true;
    }

    public function deleteUser() {
        $this->authorize(UserPolicy::DELETE, $this->user);

        $this->user->delete();
        session()->flash('success', 'user deleted.');

        return redirect()->route('users');
    }
    
    public function render()
    {
        return view('livewire.user.delete');
    }
}
