<!-- create modal -->
@if ($isOpenCreate)
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

            <div class="mt-4" x-data="{}"
                x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-jet-input type="password" class="block w-3/4 mt-1" placeholder="{{ __('Password') }}" x-ref="password"
                    wire:model.defer="password" wire:keydown.enter="deleteUser" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
@endif
<!-- /.create modal -->

<!-- edit-->
{{-- @if ($isOpenEdit)
    <x-dialog-modal>
        <x-slot name="title">
            Edit Exam
        </x-slot>

        <x-slot name="content">
            @if ($errors->any())
                <div class="p-4 bg-red-200 border border-red-400 rounded">
                    <x-validation-errors class="mb-4" />
                </div>
            @endif
            <form>

                <div class="">
                    <!-- hidden field-->
                    <input type="hidden" wire:model="exam_id">
                    <!-- /.hidden field-->
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <!-- exam_code -->
                            <div class="mt-3 mb-3">
                                <x-label for="exam_code" value="{{ __('Exam Code (optional)') }}" />
                                <x-input id="exam_code" placeholder="(ex. 234)" class="block mt-1" type="text"
                                    wire:model="exam_code" :value="old('exam_code')" autofocus autocomplete="exam_code" />
                                <x-input-error for="exam_code" />
                            </div>
                            <!-- /.exam_code -->

                            <!-- exam_name -->
                            <div class="mt-3 mb-3">
                                <x-label for="exam_name" value="{{ __('Exam Name *') }}" />
                                <x-input id="exam_name" placeholder="(ex. English)" class="block mt-1"
                                    type="text" wire:model="exam_name" :value="old('exam_name')" autocomplete="exam_name" />
                                <x-input-error for="exam_name" />
                            </div>
                            <!-- /.exam_name -->

                            <!-- class id -->
                            <div class="mt-3 mb-3">
                                <x-label for="class_room_id" value="{{ __('Class *') }}" />
                                <select
                                    class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model="class_room_id">
                                    <option value="">-- select class --</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">
                                            {{ $classroom->class_room }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="section_id" />
                            </div>
                            <!-- /.class id -->
                        </div>

                        <div>
                            <!-- subject_teach -->
                            <div class="mt-3 mb-3">
                                <x-label for="duration" value="{{ __('Subject Teacher *') }}" />
                                <select
                                    class="w-2/3 border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                    wire:model="staff_id">
                                    <option value="">-- select section --</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}">
                                            {{ $staff->first_name }}
                                            {{ $staff->last_name }} ({{ $staff->subject->subject_name ?? '' }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="section_id" />
                            </div>
                            <!-- /.subject_teach -->

                            <!-- duration -->
                            <div class="mt-3 mb-3">
                                <x-label for="duration" value="{{ __('Duration *') }}" />
                                <x-input id="duration" class="block mt-1" type="text" wire:model="duration"
                                    :value="old('duration')" autocomplete="duration" />
                                <x-input-error for="duration" />
                            </div>
                            <!-- /.duration -->
                        </div>
                    </div>

                    <div>
                        <x-secondary-button wire:click.prevent="closeEdit" wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-secondary-button>
                        <x-button class="mt-4" wire:click.prevent="update()" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
@endif --}}
<!-- /.edit-->


<!-- /delete modal -->
{{-- @if ($isOpenDelete)
    <x-confirmation-modal>
        <x-slot name="title">
            Delete Exam
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this exam? Once delete, it will be lost permanently.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click.prevent="closeDelete" wire:loading.attr="disabled">
                Nevermind
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click.prevent="delete({{ $exam }})"
                wire:loading.attr="disabled">
                Delete Exam
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
@endif --}}
<!-- /.delete modal -->
