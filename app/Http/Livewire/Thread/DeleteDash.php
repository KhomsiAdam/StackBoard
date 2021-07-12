<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteDash extends Component
{
    use AuthorizesRequests;

    public $thread;
    public $confirmingThreadDelete = false;

    public function confirmThreadDelete() {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-thread');
        $this->confirmingThreadDelete = true;
    }
    
    public function deleteDashThread() {
        $this->authorize(ThreadPolicy::DELETE, $this->thread);

        $this->thread->delete();
        session()->flash('success', 'Thread deleted.');

        return redirect()->route('admin.threads.owned');
    }
    
    public function render()
    {
        return view('livewire.thread.delete-dash');
    }
}
