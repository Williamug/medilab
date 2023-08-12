<!-- create modal -->
@if ($isOpenCreate)
    <x-modal>
        <div>
            <x-slot name="title">
                Enter Lab Service
            </x-slot>

            <x-slot name="content">
                @if ($errors->any())
                    <x-jet-validation-errors class="mb-4" />
                @endif
                <form>
                    <!-- category -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="catagory_id" value="{{ __('Category') }}" />
                        <select
                            class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.lazy="catagory_id">
                            <option value="">-- select category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('catagory_id') ? 'selected' : '' }}>
                                    {{ $category->catagory_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="catagory_id" />
                    </div>
                    <!-- /.category -->

                    <!-- test name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="test_name" value="{{ __('Test Name') }}" />
                            <x-jet-input class="md:w-2/3" id="test_name" type="text" wire:model.lazy="test_name"
                                :value="old('test_name')" autofocus />
                            <x-jet-input-error for="test_name" />
                        </div>
                    </div>
                    <!-- test name -->

                    <!-- price -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="price" value="{{ __('Price') }}" />
                            <x-jet-input class="md:w-2/3" id="price" type="text" wire:model.lazy="price"
                                :value="old('price')" autofocus />
                            <x-jet-input-error for="price" />
                        </div>
                    </div>
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
                Edit Lab Service
            </x-slot>

            <x-slot name="content">
                <form>
                    <!-- hidden field-->
                    <input type="hidden" wire:model="test_service_id">
                    <!-- category -->
                    <div class="mt-3 mb-3">
                        <x-jet-label for="catagory_id" value="{{ __('Category') }}" />
                        <select
                            class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                            wire:model.lazy="catagory_id">
                            <option value="">-- select category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('catagory_id') ? 'selected' : '' }}>
                                    {{ $category->catagory_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="catagory_id" />
                    </div>
                    <!-- /.category -->

                    <!-- test name -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="test_name" value="{{ __('Test Name') }}" />
                            <x-jet-input class="md:w-2/3" id="test_name" type="text" wire:model.lazy="test_name"
                                :value="old('test_name')" autofocus />
                            <x-jet-input-error for="test_name" />
                        </div>
                    </div>
                    <!-- test name -->

                    <!-- price -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="price" value="{{ __('Price') }}" />
                            <x-jet-input class="md:w-2/3" id="price" type="text" wire:model.lazy="price"
                                :value="old('price')" autofocus />
                            <x-jet-input-error for="price" />
                        </div>
                    </div>
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
            Delete {{ $test_service->test_name }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <div class="mb-2">
                    You are about to delete this lab service. Are you sure you want to continue?
                </div>
                <small><span class="font-bold">Note: </span> All deleted lab services are stored in a trash and can be
                    restored
                    later when you need them.</small>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button class="mr-2" wire:click.prevent="delete({{ $test_service }})"
                wire:loading.attr="disabled">
                Delete Lab Service
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>
        </x-slot>
    </x-modal>
@endif
<!-- /.delete modal -->
