<div class="px-6 py-1 text-sm transition duration-100 bg-red-400 rounded hover:bg-red-500">
    <a wire:click="confirmReplyDelete" wire:loading.attr="disabled" class="cursor-pointer text-white">Delete</a>
    <x-jet-dialog-modal wire:model="confirmingReplyDelete">
        
        <x-slot name="title">
            {{ __('Delete reply') }}
        </x-slot>
        
        <x-slot name="content">
            {{ __('Are you sure you want to delete this reply ?') }}
        </x-slot>
        
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingReplyDelete')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            
            <x-jet-danger-button wire:click="deleteReply" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
