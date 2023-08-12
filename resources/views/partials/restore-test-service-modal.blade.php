<!-- /delete modal -->
@if ($isOpenRestore)
    <x-modal>
        <x-slot name="title">
            Restore {{ $result_option->result }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2">
                    You are about to restore this service. Are you sure you want to continue?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="restore({{ $result_options }})"
                wire:loading.attr="disabled">
                Restore
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeRestore" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif
<!-- /.delete modal -->
