<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Enter Result Option
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- result -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="result" value="{{ __('Result Option') }}" />
                            <x-jet-input class="md:w-2/3" id="result" type="text" wire:model.lazy="result"
                                :value="old('result')" placeholder="(Ex. Positive)" autofocus />
                            <x-jet-input-error for="result" />
                        </div>
                    </div>
                    <!-- result -->

                    <!-- code -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="code" value="{{ __('Code') }}" />
                            <x-jet-input class="md:w-2/3" id="code" type="text" wire:model.lazy="code"
                                :value="old('code')" placeholder="(Ex. POSITIVE)" autofocus />
                            <x-jet-input-error for="code" />
                        </div>
                    </div>
                    <!-- code -->

                    <!-- symbol -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="symbol" value="{{ __('Symbol') }}" />
                            <x-jet-input class="md:w-2/3" id="symbol" type="text" wire:model.lazy="symbol"
                                :value="old('symbol')" placeholder="(Ex. +)" autofocus />
                            <x-jet-input-error for="symbol" />
                        </div>
                    </div>
                    <!-- result -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="store" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- /.create modal -->

<!-- edit-->
@if ($isOpenEdit)
    <x-modal>
        <div>
            <x-slot name="title">
                Edit Result Option
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="spacemen_id">

                    <!-- result -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="result" value="{{ __('Result Option') }}" />
                            <x-jet-input class="md:w-2/3" id="result" type="text" wire:model.lazy="result"
                                :value="old('result')" placeholder="(Ex. Positive)" autofocus />
                            <x-jet-input-error for="result" />
                        </div>
                    </div>
                    <!-- result -->

                    <!-- code -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="code" value="{{ __('Code') }}" />
                            <x-jet-input class="md:w-2/3" id="code" type="text" wire:model.lazy="code"
                                :value="old('code')" placeholder="(Ex. POSITIVE)" autofocus />
                            <x-jet-input-error for="code" />
                        </div>
                    </div>
                    <!-- code -->

                    <!-- symbol -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="symbol" value="{{ __('Symbol') }}" />
                            <x-jet-input class="md:w-2/3" id="symbol" type="text" wire:model.lazy="symbol"
                                :value="old('symbol')" placeholder="(Ex. +)" autofocus />
                            <x-jet-input-error for="symbol" />
                        </div>
                    </div>
                    <!-- result -->
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>

                <x-jet-secondary-button wire:click="closeEdit" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </div>
    </x-modal>
@endif
<!-- /.edit-->


<!-- /delete modal -->
@if ($isOpenDelete)
    <x-modal>
        <x-slot name="title">
            Delete {{ $result->result }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2">
                    You are about to delete this result option. Are you sure you want to continue?
                </div>
                <small><span class="font-bold">Note: </span> All deleted options are stored in a trash and can be
                    restored
                    later when you need them.</small>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $result }})"
                wire:loading.attr="disabled">
                Delete Result Option
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif
<!-- /.delete modal -->
