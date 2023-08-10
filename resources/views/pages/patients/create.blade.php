<x-app-layout>
    <x-slot name="title">
        Patients
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient
                </div>
                <div>
                    <x-app.back href="{{ route('patients.index') }}" />
                </div>
            </div>
        </x-slot>
        <x-app.flash-message />
        <div>
            <div class="space-y-4">
                <div class="mb-4">
                    <div>Note: </div>
                    <div>
                        <span class="mr-1 text-lg">*</span> Denotes Mandatory.
                    </div>
                </div>
            </div>
            <x-jet-validation-errors class="mt-4" />
            <!-- Form -->
            <form method="POST" action="{{ route('patients.store') }}">
                @csrf
                <!-- full name -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                        <x-jet-input class="md:w-2/3" id="full_name" type="text" name="full_name" :value="old('full_name')"
                            autofocus />
                        <x-jet-input-error for="full_name" />
                    </div>
                </div>
                <!-- /.full name -->

                <!-- gender -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <span class="text-gray-700 dark:text-gray-400">Gender *</span>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio dark:bg-gray-700" name="gender" value="Male"
                                    {{ old('gender') ? 'checked' : '' }}>
                                <span class="ml-2 dark:text-gray-500">Male</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio dark:bg-gray-700" name="gender" value="Female"
                                    {{ old('gender') ? 'checked' : '' }}>
                                <span class="ml-2 dark:text-gray-500">Female</span>
                            </label>
                        </div>
                        <x-jet-input-error for="gender" />
                    </div>
                </div>
                <!-- /.gender -->

                <!-- birth date/age -->
                <div class="space-y-6 mt-4">
                    <x-jet-label for="birth_date"
                        value="{{ __('Select Age if you do not know your date of birth') }}" />
                    <div class="grid grid-cols-2">
                        <div x-data="{ isOpen: true }">
                            <label class="inline-flex items-center" @click="isOpen = true">
                                <input type="radio" class="form-radio dark:bg-gray-700" name="birth_date"
                                    value="dob" checked="checked">
                                <span class="ml-2 dark:text-gray-500">
                                    Birth date
                                </span>
                            </label>
                            <div x-show="isOpen" @click.away="isOpen = false">
                                <!-- birth date. -->
                                <div class="mb-3">
                                    <x-jet-input id="dob" class="mt-1 text-base" type="date" name="dob"
                                        autocomplete="dob" checked />
                                    <x-jet-input-error for="dob" class="ml-9" />
                                </div>
                                <!-- birth date. -->
                            </div>
                        </div>

                        <div x-data="{ isOpen: false }">
                            <label class="inline-flex items-center" @click="isOpen = true">
                                <input type="radio" class="form-radio dark:bg-gray-700" name="birth_date">
                                <span class="ml-2 dark:text-gray-500">
                                    Age
                                </span>
                            </label>
                            <div x-show="isOpen" @click.away="isOpen = false">
                                <!-- age. -->
                                <div class="mb-3">
                                    <input id="age" class="mt-1 text-base form-input w-full" type="text"
                                        name="age" value="age" autocomplete="age" />
                                    <x-jet-input-error for="age" class="ml-9" />
                                </div>
                                <!-- age. -->
                            </div>
                        </div>
                        <x-jet-input-error for="birth_date" />
                    </div>
                    <!-- /.birth date/age -->

                    <!-- phone number -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                            <x-jet-input class="md:w-2/3" id="phone_number" type="text" name="phone_number"
                                :value="old('phone_number')" autofocus />
                            <x-jet-input-error for="phone_number" />
                        </div>
                    </div>
                    <!-- /.phone number -->

                    <!-- residence -->
                    <div>
                        <x-jet-label for="residence" value="{{ __('Residence') }}" />
                        <x-app.text id="residence" class="block w-full mt-1 md:w-2/3" :value="old('residence')"
                            name="residence">
                            {{ old('residence') }}
                        </x-app.text>
                        <x-jet-input-error for="residence" />
                    </div>
                    <!-- /.residence -->

                    <div class="flex items-center justify-between mt-6">
                        <x-jet-button class="ml-3">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
            </form>

        </div>
    </x-app.card>
</x-app-layout>
