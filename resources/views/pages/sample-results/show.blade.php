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
                    <x-app.back href="{{ route('sample-results.index') }}" />
                </div>
            </div>
        </x-slot>
        <div>
            <div>
                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Full Name:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->full_name }}
                    </div>
                </div>

                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Age:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->age }}
                    </div>
                </div>
            </div>
            <hr />

            <div>
                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Phone Number:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->phone_number }}
                    </div>
                </div>

                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Resident:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->residence }}
                    </div>
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
