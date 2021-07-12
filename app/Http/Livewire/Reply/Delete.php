<?php

namespace App\Http\Livewire\Reply;

use Livewire\Component;
use App\Policies\ReplyPolicy;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{   
    use AuthorizesRequests;

    public $reply;
    public $confirmingReplyDelete = false;

    public function confirmReplyDelete() {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-reply');
        $this->confirmingReplyDelete = true;
    }

    public function deleteReply() {
        $this->authorize(ReplyPolicy::DELETE, $this->reply);

        $this->reply->delete();
        session()->flash('success', 'reply deleted.');
        // return back()->with('success', 'Reply Deleted.');
        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.reply.delete');
    }
}
