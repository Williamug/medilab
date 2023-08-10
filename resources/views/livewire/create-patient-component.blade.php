    <div class="mt-4">
        <!-- select patient type -->
        <x-jet-label for="birth_date" value="{{ __('Select patient type') }}" />
        <div class="md:w-2/3">
            <div x-data="{ isOpen: false }">
                <label class="inline-flex items-center" @click="isOpen = true">
                    <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="patient_type"
                        value="Adult">
                    <span class="ml-2 font-bold uppercase dark:text-gray-500">
                        Adult
                    </span>
                </label>
                <div x-show="isOpen" @click.away="isOpen = false">
                    <div class="mt-5"></div>
                    <hr />
                    <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                        Patient's bio & contact information
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
                        <x-jet-validation-errors class="mt-4" />
                        <!-- Form -->
                        <form wire:submit.prevent="storeAdultPatient">

                            <!-- full name -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                    <x-jet-input class="md:w-2/3" id="full_name" type="text"
                                        wire:model.lazy="adult_full_name" :value="old('full_name')" autofocus />
                                    <x-jet-input-error for="adult_full_name" />
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
                                                wire:model.lazy="adult_gender" value="Male"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Male</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="gender" value="Female"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Female</span>
                                        </label>
                                    </div>
                                    <x-jet-input-error for="adult_gender" />
                                </div>
                            </div>
                            <!-- /.gender -->

                            <div class="mt-4 space-y-6">
                                <!-- birth date/age -->
                                <div>
                                    <x-jet-label for="birth_date"
                                        value="{{ __('Select Age if the patient has forgotten his/her birth date *') }}" />
                                    <div class="md:w-2/3">
                                        <div x-data="{ isOpen: true }">

                                            <!-- date of birth radio -->
                                            <label class="inline-flex items-center" @click="isOpen = true">
                                                <input type="radio" class="form-radio dark:bg-gray-700"
                                                    wire:model.lazy="birth_date" value="dob" checked="">
                                                <span class="ml-2 dark:text-gray-500">
                                                    Birth date
                                                </span>
                                            </label>
                                            <!-- date of birth radio -->

                                            <div x-show="isOpen" @click.away="isOpen = false">
                                                <!-- birth date. -->
                                                <div class="mb-3">
                                                    <x-jet-input id="dob" class="mt-1 text-base" type="date"
                                                        wire:model.lazy="adult_dob" autocomplete="dob" checked />
                                                    <x-jet-input-error for="adult_dob" />
                                                </div>
                                                <!-- birth date. -->
                                            </div>
                                        </div>

                                        <div x-data="{ isOpen: false }">
                                            <label class="inline-flex items-center" @click="isOpen = true">
                                                <input type="radio" class="form-radio dark:bg-gray-700"
                                                    wire:model.lazy="birth_date">
                                                <span class="ml-2 dark:text-gray-500">
                                                    Age
                                                </span>
                                            </label>
                                            <div x-show="isOpen" @click.away="isOpen = false">
                                                <!-- age. -->
                                                <div class="mb-3">
                                                    <input id="age" class="w-full mt-1 text-base form-input"
                                                        type="text" wire:model.lazy="adult_age" value=""
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

                                <!-- phone number -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                        <x-jet-input class="md:w-2/3" id="phone_number" type="text"
                                            wire:model.lazy="adult_phone_number" :value="old('phone_number')" autofocus />
                                        <x-jet-input-error for="adult_phone_number" />
                                    </div>
                                </div>
                                <!-- /.phone number -->

                                <!-- email -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input class="md:w-2/3" id="email" type="email"
                                            wire:model.lazy="adult_email" :value="old('email')" autofocus />
                                        <x-jet-input-error for="adult_email" />
                                    </div>
                                </div>
                                <!-- /.email -->

                                <!-- residence -->
                                <div>
                                    <x-jet-label for="residence" value="{{ __('Residence') }}" />
                                    <x-app.text id="residence" class="block w-full mt-1 md:w-2/3" :value="old('residence')"
                                        wire:model.lazy="adult_residence" rows="2">
                                        {{ old('residence') }}
                                    </x-app.text>
                                    <x-jet-input-error for="adult_residence" />
                                </div>
                                <!-- /.residence -->

                                <div class="mt-5"></div>
                                <hr />
                                <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                                    Patient's measurement
                                </div>

                                <!-- temperature -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                                        <x-jet-input class="md:w-2/3" id="temperature" type="text"
                                            wire:model.lazy="adult_temperature" :value="old('temperature')" autofocus />
                                        <x-jet-input-error for="temperature" />
                                    </div>
                                </div>
                                <!-- /.temperature -->

                                <!-- weight -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="weight" value="{{ __('Weight') }}" />
                                        <x-jet-input class="md:w-2/3" id="weight" type="text"
                                            wire:model.lazy="adult_weight" :value="old('weight')" autofocus />
                                        <x-jet-input-error for="weight" />
                                    </div>
                                </div>
                                <!-- /.weight -->

                                <!-- height -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="height" value="{{ __('Height') }}" />
                                        <x-jet-input class="md:w-2/3" id="height" type="text"
                                            wire:model.lazy="adult_height" :value="old('height')" autofocus />
                                        <x-jet-input-error for="height" />
                                    </div>
                                </div>
                                <!-- /.height -->

                                <div class="flex items-center justify-between mt-6">
                                    <x-jet-button class="ml-3">
                                        {{ __('Save') }}
                                    </x-jet-button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div x-data="{ isOpen: false }">
                <label class="inline-flex items-center" @click="isOpen = true">
                    <input type="radio" class="form-radio dark:bg-gray-700" wire:model.lazy="patient_type"
                        value="Child">
                    <span class="ml-2 font-bold uppercase dark:text-gray-500">
                        Child
                    </span>
                </label>
                <div x-show="isOpen" @click.away="isOpen = false">
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

                        <form wire:submit.prevent="storeChildPatient">
                            <x-jet-validation-errors class="mt-4" />

                            <!-- full name -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                    <x-jet-input class="md:w-2/3" id="full_name" type="text"
                                        wire:model.lazy="child_full_name" :value="old('full_name')" autofocus />
                                    <x-jet-input-error for="child_full_name" />
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
                                                wire:model.lazy="child_gender" value="Male"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Male</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio dark:bg-gray-700"
                                                wire:model.lazy="child_gender" value="Female"
                                                {{ old('gender') ? 'checked' : '' }}>
                                            <span class="ml-2 dark:text-gray-500">Female</span>
                                        </label>
                                    </div>
                                    <x-jet-input-error for="child_gender" />
                                </div>
                            </div>
                            <!-- /.gender -->

                            <div class="mt-4 space-y-6">
                                <!-- birth date/age -->
                                <div>
                                    <x-jet-label for="birth_date"
                                        value="{{ __('Select Age if the patient has forgotten his/her birth date *') }}" />
                                    <div class="md:w-2/3">
                                        <div x-data="{ isOpen: true }">

                                            <!-- date of birth radio -->
                                            <label class="inline-flex items-center" @click="isOpen = true">
                                                <input type="radio" class="form-radio dark:bg-gray-700"
                                                    wire:model.lazy="child_birth_date" value="dob" checked="">
                                                <span class="ml-2 dark:text-gray-500">
                                                    Birth date
                                                </span>
                                            </label>
                                            <!-- date of birth radio -->

                                            <div x-show="isOpen" @click.away="isOpen = false">
                                                <!-- birth date. -->
                                                <div class="mb-3">
                                                    <x-jet-input id="dob" class="mt-1 text-base" type="date"
                                                        wire:model.lazy="child_dob" autocomplete="dob" checked />
                                                    <x-jet-input-error for="child_dob" />
                                                </div>
                                                <!-- birth date. -->
                                            </div>
                                        </div>

                                        <div x-data="{ isOpen: false }">
                                            <label class="inline-flex items-center" @click="isOpen = true">
                                                <input type="radio" class="form-radio dark:bg-gray-700"
                                                    wire:model.lazy="birth_date">
                                                <span class="ml-2 dark:text-gray-500">
                                                    Age
                                                </span>
                                            </label>
                                            <div x-show="isOpen" @click.away="isOpen = false">
                                                <!-- age. -->
                                                <div class="mb-3">
                                                    <input id="age" class="w-full mt-1 text-base form-input"
                                                        type="text" wire:model.lazy="child_age" value=""
                                                        placeholder="Enter age" autocomplete="age" />
                                                    <x-jet-input-error for="age" />
                                                </div>
                                                <!-- age. -->
                                            </div>
                                        </div>
                                        <x-jet-input-error for="child_birth_date" />
                                    </div>
                                </div>
                                <!-- /.birth date/age -->

                                <div class="mt-5"></div>
                                <hr />
                                <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                                    Patient's measurement
                                </div>

                                <!-- temperature -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="temperature" value="{{ __('Temperature') }}" />
                                        <x-jet-input class="md:w-2/3" id="temperature" type="text"
                                            wire:model.lazy="child_temperature" :value="old('temperature')" autofocus />
                                        <x-jet-input-error for="child_temperature" />
                                    </div>
                                </div>
                                <!-- /.temperature -->

                                <!-- weight -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="weight" value="{{ __('Weight') }}" />
                                        <x-jet-input class="md:w-2/3" id="weight" type="text"
                                            wire:model.lazy="child_weight" :value="old('weight')" autofocus />
                                        <x-jet-input-error for="child_weight" />
                                    </div>
                                </div>
                                <!-- /.weight -->

                                <!-- height -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="height" value="{{ __('Height') }}" />
                                        <x-jet-input class="md:w-2/3" id="height" type="text"
                                            wire:model.lazy="child_height" :value="old('height')" autofocus />
                                        <x-jet-input-error for="child_height" />
                                    </div>
                                </div>
                                <!-- /.height -->

                                <div class="mt-5"></div>
                                <hr />
                                <div class="p-1 mt-1 text-lg font-bold uppercase bg-gray-200">
                                    Patient's Next of kin/guardian
                                </div>

                                <!-- next of kin/guardian info-->
                                <!-- full name -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                                        <x-jet-input class="md:w-2/3" id="full_name" type="text"
                                            wire:model.lazy="guardian_full_name" :value="old('full_name')" autofocus />
                                        <x-jet-input-error for="guardian_full_name" />
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
                                                    wire:model.lazy="guardian_gender" value="Male"
                                                    {{ old('gender') ? 'checked' : '' }}>
                                                <span class="ml-2 dark:text-gray-500">Male</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6">
                                                <input type="radio" class="form-radio dark:bg-gray-700"
                                                    wire:model.lazy="guardian_gender" value="Female"
                                                    {{ old('gender') ? 'checked' : '' }}>
                                                <span class="ml-2 dark:text-gray-500">Female</span>
                                            </label>
                                        </div>
                                        <x-jet-input-error for="guardian_gender" />
                                    </div>
                                </div>
                                <!-- /.gender -->

                                <!-- relationship to the child -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="relationship_to_child"
                                            value="{{ __('What is the relationship to the child') }}" />
                                        <x-jet-input class="md:w-2/3" id="relationship_to_child" type="text"
                                            wire:model.lazy="relationship_to_child" :value="old('relationship_to_child')" autofocus />
                                        <x-jet-input-error for="relationship_to_child" />
                                    </div>
                                </div>
                                <!-- /.relationship to the child -->

                                <!-- phone number -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                        <x-jet-input class="md:w-2/3" id="phone_number" type="text"
                                            wire:model.lazy="guardian_phone_number" :value="old('phone_number')" autofocus />
                                        <x-jet-input-error for="guardian_phone_number" />
                                    </div>
                                </div>
                                <!-- /.phone number -->

                                <!-- email -->
                                <div class="space-y-4">
                                    <div class="mb-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input class="md:w-2/3" id="email" type="email"
                                            wire:model.lazy="guardian_email" :value="old('email')" autofocus />
                                        <x-jet-input-error for="guardian_email" />
                                    </div>
                                </div>
                                <!-- /.email -->

                                <!-- residence -->
                                <div>
                                    <x-jet-label for="residence" value="{{ __('Residence') }}" />
                                    <x-app.text id="residence" class="block w-full mt-1 md:w-2/3" :value="old('residence')"
                                        wire:model.lazy="guardian_residence" rows="2">
                                        {{ old('residence') }}
                                    </x-app.text>
                                    <x-jet-input-error for="guardian_residence" />
                                </div>
                                <!-- /.residence -->
                                <!-- /.next of kin/guardian info-->

                                <div class="flex items-center justify-between mt-6">
                                    <x-jet-button class="ml-3">
                                        {{ __('Save') }}
                                    </x-jet-button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/. seletect patient type -->
