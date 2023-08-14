    <div class="mt-4">
        <div class="">
            <div class="mt-5"></div>
            <hr />
            <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                Patient's bio
            </div>
            <div class="mt-8 mb-12">
                <div class="space-y-4">
                    <div class="mb-4">
                        <div>Note: </div>
                        <div>
                            <span class="mr-1 text-lg">*</span> Denotes Mandatory.
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="storePatient">
                    <x-jet-validation-errors class="mt-4" />
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <!-- full name -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                    <x-jet-input class="block mt-1" id="full_name" type="text"
                                        wire:model.lazy="full_name" :value="old('full_name')" autofocus />
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
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="gender" name="gender" value="male">
                                            <span class="ml-2 dark:text-gray-500">Male</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="gender" name="gender" value="Female">
                                            <span class="ml-2 dark:text-gray-500">Female</span>
                                        </label>
                                    </div>
                                    <x-jet-input-error for="gender" />
                                </div>
                            </div>
                            <!-- /.gender -->

                            <!-- birth date/age -->
                            <div>
                                <x-jet-label for="birth_date"
                                    value="{{ __('Select Age if the patient has forgotten his/her birth date *') }}" />
                                <div class="block mt-1">
                                    <div x-data="{ isOpen: true }">

                                        <!-- date of birth radio -->
                                        <label class="inline-flex items-center" @click="isOpen = true">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model="birth_date" value="dob">
                                            <span class="ml-2 dark:text-gray-500">
                                                Birth date
                                            </span>
                                        </label>
                                        <!-- date of birth radio -->

                                        <div x-show="isOpen" @click.away="isOpen = false">
                                            <!-- birth date. -->
                                            <div class="mb-3">
                                                <x-jet-input id="dob" class="mt-1 text-base" type="date"
                                                    wire:model.lazy="dob" autocomplete="dob" />
                                                <x-jet-input-error for="dob" />
                                            </div>
                                            <!-- birth date. -->
                                        </div>
                                    </div>

                                    <div x-data="{ isOpen: false }">
                                        <label class="inline-flex items-center" @click="isOpen = true">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model="birth_date" value="age">
                                            <span class="ml-2 dark:text-gray-500">
                                                Age
                                            </span>
                                        </label>
                                        <div x-show="isOpen" @click.away="isOpen = false">
                                            <!-- age. -->
                                            <div class="mb-3">
                                                <input id="age" class="w-full mt-1 text-base form-input"
                                                    type="number" wire:model.lazy="age" value=""
                                                    placeholder="Enter age" autocomplete="age" />
                                                <x-jet-input-error for="age" />
                                            </div>
                                            <!-- age. -->
                                        </div>
                                    </div>
                                    <x-jet-input-error for="birth_date" />
                                </div>
                            </div>
                            <!-- /.birth date/age -->
                        </div>
                        <div>
                            <!-- phone number -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                    <x-jet-input class="block mt-1" id="phone_number" type="text"
                                        wire:model.lazy="phone_number" :value="old('phone_number')" autofocus />
                                    <x-jet-input-error for="phone_number" />
                                </div>
                            </div>
                            <!-- /.phone number -->

                            <!-- email -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input class="block mt-1" id="email" type="email"
                                        wire:model.lazy="email" :value="old('email')" autofocus />
                                    <x-jet-input-error for="email" />
                                </div>
                            </div>
                            <!-- /.email -->

                            <!-- residence -->
                            <div>
                                <x-jet-label for="residence" value="{{ __('Residence') }}" />
                                <x-app.text id="residence" class="block mt-1 " :value="old('residence')"
                                    wire:model.lazy="residence" rows="2">
                                    {{ old('residence') }}
                                </x-app.text>
                                <x-jet-input-error for="residence" />
                            </div>
                            <!-- /.residence -->
                        </div>
                    </div>


                    <div class="mt-4 space-y-6">
                        <div class="mt-5"></div>
                        <hr />
                        <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                            Patient's measurement
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <!-- temperature -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                                        <x-jet-input class="block mt-1" id="temperature" type="number"
                                            wire:model.lazy="temperature" :value="old('temperature')" autofocus />
                                        <x-jet-input-error for="temperature" />
                                    </div>
                                </div>
                                <!-- /.temperature -->

                                <!-- weight -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="weight" value="{{ __('Weight') }}" />
                                        <x-jet-input class="block mt-1" id="weight" type="number"
                                            wire:model.lazy="weight" :value="old('weight')" autofocus />
                                        <x-jet-input-error for="weight" />
                                    </div>
                                </div>
                                <!-- /.weight -->
                            </div>
                            <div>
                                <!-- height -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="height" value="{{ __('Height') }}" />
                                        <x-jet-input class="block mt-1" id="height" type="number"
                                            wire:model.lazy="height" :value="old('height')" autofocus />
                                        <x-jet-input-error for="height" />
                                    </div>
                                </div>
                                <!-- /.height -->
                            </div>
                        </div>

                        <div class="mt-5"></div>
                        <hr />
                        <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                            Patient's Next of kin
                        </div>

                        <!-- next of kin/next_of_kin info-->
                        <div class="grid grid-cols-2 gap-8">
                            <!-- full name -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                    <x-jet-input class="block w-full mt-1" id="full_name" type="text"
                                        wire:model.lazy="kin_full_name" :value="old('full_name')" autofocus />
                                    <x-jet-input-error for="kin_full_name" />
                                </div>
                            </div>
                            <!-- /.full name -->

                            <!-- gender -->
                            <div>
                                <div class="mb-4">
                                    <span class="text-gray-700 dark:text-gray-400">Gender *</span>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="kin_gender" value="Male"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Male</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="kin_gender" value="Female"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Female</span>
                                        </label>
                                    </div>
                                    <x-jet-input-error for="kin_gender" />
                                </div>
                            </div>
                            <!-- /.gender -->

                            <!-- relationship to the patient -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="patient_relation"
                                        value="{{ __('What is the relationship to the patient') }}" />
                                    <x-jet-input class="block mt-1" id="patient_relation" type="text"
                                        wire:model.lazy="patient_relation" :value="old('patient_relation')" autofocus />
                                    <x-jet-input-error for="patient_relation" />
                                </div>
                            </div>
                            <!-- /.relationship to the patient -->

                            <!-- phone number -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                    <x-jet-input class="block w-2/3 mt-1" id="phone_number" type="text"
                                        wire:model.lazy="kin_phone_number" :value="old('phone_number')" autofocus />
                                    <x-jet-input-error for="kin_phone_number" />
                                </div>
                            </div>
                            <!-- /.phone number -->

                            <!-- email -->
                            <div>
                                <div class="mb-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input class="block mt-1" id="email" type="email"
                                        wire:model.lazy="kin_email" :value="old('email')" autofocus />
                                    <x-jet-input-error for="kin_email" />
                                </div>
                            </div>
                            <!-- /.email -->

                            <!-- residence -->
                            <div>
                                <x-jet-label for="residence" value="{{ __('Residence') }}" />
                                <x-app.text id="residence" class="block mt-1" :value="old('residence')"
                                    wire:model.lazy="kin_residence" rows="2">
                                    {{ old('residence') }}
                                </x-app.text>
                                <x-jet-input-error for="kin_residence" />
                            </div>
                            <!-- /.residence -->
                            <!-- /.next of kin/next_of_kin info-->
                        </div>

                        <!-- service tests to be done -->
                        <div class="mt-5"></div>
                        <hr />
                        <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                            Tests to be carried out
                        </div>

                        <div class="grid grid-cols-2 gap-8">
                            <!-- lab service -->
                            <div>
                                <x-jet-label for="lab_service_id" value="{{ __('Lab Service') }}" />
                                <div class="flex">
                                    <select
                                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                        wire:model.lazy="lab_service_id.0">
                                        <option value="">-- select service --</option>
                                        @foreach ($lab_services as $lab_service)
                                            <option value="{{ $lab_service->id }}"
                                                {{ old('lab_service_id') ? 'selected' : '' }}>
                                                {{ $lab_service->service_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <x-jet-button class="block ml-2" wire:click.prevent="add({{ $i }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-4 h-4 bi bi-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </x-jet-button>
                                </div>
                                <x-jet-input-error for="lab_service_id.0" />
                            </div>
                            <!-- /.lab service -->
                        </div>
                        @foreach ($inputs as $key => $value)
                            <div class="grid grid-cols-2 gap-8">
                                <!-- lab service -->
                                <div>
                                    <div class="flex">
                                        <select
                                            class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                            wire:model.lazy="lab_service_id.{{ $value }}">
                                            <option value="">-- select category --</option>
                                            @foreach ($lab_services as $lab_service)
                                                <option value="{{ $lab_service->id }}"
                                                    {{ old('lab_service_id') ? 'selected' : '' }}>
                                                    {{ $lab_service->service_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <x-jet-secondary-button class="block ml-2"
                                            wire:click.prevent="remove({{ $key }})">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </x-jet-secondary-button>
                                    </div>
                                    <x-jet-input-error for="lab_service_id.0" />
                                </div>
                                <!-- /.lab service -->
                            </div>
                        @endforeach

                        <div class="flex items-center justify-between mt-6">
                            <x-jet-button class="ml-3">
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/. seletect patient type -->
