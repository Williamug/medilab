<!-- /receive patient modal -->
@if ($isOpenReceive)
    <x-modal>
        <x-slot name="title">
            Receive Patient
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2">
                    Patient will now get in for collection of samples and testing. Are you sure you want to continue?
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button class="mr-2" wire:click.prevent="receivePatient({{ $patient }})"
                wire:loading.attr="disabled">
                Invite Patient
            </x-jet-button>

            <x-jet-secondary-button wire:click.prevent="closeReceive" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif
<!-- /.receive patient modal -->
