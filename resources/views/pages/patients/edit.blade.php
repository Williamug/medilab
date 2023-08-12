<x-app-layout>
    <x-slot name="title">
        Patient's Results
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient's Results
                </div>
                <div>
                    <x-app.back href="{{ route('patients.show', $patient) }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('patients.update', $patient) }}">
                @csrf
                @method('put')

                <!-- full name -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="full_name" value="{{ __('Full Name *') }}" />
                        <x-jet-input class="md:w-2/3" id="full_name" type="text" name="full_name" :value="old('full_name') ?? $patient->full_name"
                            autofocus />
                        <x-jet-input-error for="full_name" />
                    </div>
                </div>
                <!-- /.full name -->

                <!-- gender -->
                <div class="mt-4">
                    <span class="text-gray-700">Gender *</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Male"
                                @checked(old('gender', $patient->gender) == 'Male')>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="gender" value="Female"
                                @checked(old('gender', $patient->gender) == 'Female')>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    <x-jet-input-error for="gender" />
                </div>
                <!-- /.gender -->

                <!-- date of birth -->
                <div class="space-y-4">
                    <div class="mb-4">


                        <x-jet-input-error for="age" class="ml-9" />

                        <x-jet-label for="age" value="{{ __('Date of Birth') }}" />
                        <x-jet-input class="md:w-2/3" id="age" type="text" name="age" :value="!is_null($patient->birth_date) ? $patient->age : $patient->visit_info->age" />
                    </div>
                </div>
                <!-- /.date of birth -->

                <!-- phone number -->
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-jet-input class="md:w-2/3" id="phone_number" type="text" name="phone_number"
                            :value="old('phone_number') ?? $patient->phone_number" autofocus />
                        <x-jet-input-error for="phone_number" />
                    </div>
                </div>
                <!-- /.phone number -->

                <!-- residence -->
                <div>
                    <x-jet-label for="residence" value="{{ __('Residence') }}" />
                    <x-app.text id="residence" class="block w-full mt-1 md:w-2/3" :value="old('residence')" name="residence">
                        {{ old('residence') ?? $patient->residence }}
                    </x-app.text>
                    <x-jet-input-error for="residence" />
                </div>
                <!-- /.residence -->

                <div class="flex items-center justify-between mt-6">
                    <x-jet-button class="ml-3">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />
        </div>
    </x-app.card>
</x-app-layout>
