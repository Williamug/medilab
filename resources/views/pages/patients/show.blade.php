<x-app-layout>
    <x-slot name="title">
        Patient Info
    </x-slot>

    <x-app.flash-message />

    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Patient Info
                </div>
                <div>
                    <x-app.back href="{{ route('patients.index') }}" />
                </div>
            </div>
        </x-slot>
        <hr />
        <div>
            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Registration Number:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->registration_number }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Full Name:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->full_name }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Gender:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->gender }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Age:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->age }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Phone Number:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->phone_number }}
                </div>
            </div>

            <div class="grid grid-cols-2 mb-4">
                <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                    Resident:
                </div>
                <div class="px-2 py-2 dark:text-gray-400">
                    {{ $patient->residence }}
                </div>
            </div>
        </div>
        @if (!is_null($patient->next_of_kin_id))
            <div>
                <div class="mt-8 text-2xl font-bold">
                    Next of Kin Info
                </div>
                <hr />
                <div>
                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Name:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->name }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Gender
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->gender }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Relation to patient:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->relationship_to_patient }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Phone Number:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->phone_number }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Email:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->email }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Resident:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $patient->next_of_kin->residence }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-app.card>
</x-app-layout>
