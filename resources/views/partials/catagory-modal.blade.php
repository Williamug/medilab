<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Enter Service Category
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <div>
                        <label for="category_name" class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Service Category
                        </label>
                        <input id="catagory_name"
                            class="flex items-center w-full h-10 pl-3 mt-2 mb-1 text-sm font-normal text-gray-600 border border-gray-300 rounded focus:outline-none focus:border focus:border-indigo-700"
                            wire:model.lazy="catagory_name" />
                        <x-jet-input-error for="catagory_name" />
                    </div>

                    <div class="mb-4">
                        <label for="email2" class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Description
                        </label>
                        <x-app.text id="description" class="block mt-1 " :value="old('description')" wire:model.lazy="description"
                            rows="2">
                            {{ old('description') }}
                        </x-app.text>
                        <x-jet-input-error for="description" />
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="storePatient" wire:loading.attr="disabled">
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
                Edit Service Category
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="catagory_id">

                    <!-- category name-->
                    <div>
                        <label for="category_name"
                            class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Service Category
                        </label>
                        <input id="catagory_name"
                            class="flex items-center w-full h-10 pl-3 mt-2 mb-1 text-sm font-normal text-gray-600 border border-gray-300 rounded focus:outline-none focus:border focus:border-indigo-700"
                            wire:model.lazy="catagory_name" />
                        <x-jet-input-error for="catagory_name" />
                    </div>

                    <div class="mb-4">
                        <label for="email2" class="text-sm font-bold leading-tight tracking-normal text-gray-800">
                            Description
                        </label>
                        <x-app.text id="description" class="block mt-1 " :value="old('description')" wire:model.lazy="description"
                            rows="2">
                            {{ old('description') }}
                        </x-app.text>
                        <x-jet-input-error for="description" />
                    </div>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="mr-4" wire:click="updatePatient" wire:loading.attr="disabled">
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
            Delete {{ $category->catagory_name }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2">
                    You are about to delete this category. Are you sure you want to continue?
                </div>
                <small><span class="font-bold">Note: </span> All deleted categories are stored in trash and you can
                    restore
                    them later when you need them.</small>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $category }})"
                wire:loading.attr="disabled">
                Delete category
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif
<!-- /.delete modal -->
