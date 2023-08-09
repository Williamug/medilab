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
                        Date:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->visit_info->visit_date->format('d/M/Y') }}
                    </div>
                </div>
                <hr />

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
                        Gender:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->patient->gender }}
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
                        Temperature:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        <span>
                            {{ $sample_result->patient->visit_info->temperature }}
                        </span>
                        <!-- encoding celsius symbol -->
                        <spa>&#8451</spa>
                    </div>
                </div>

                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Weight:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        <span>{{ $sample_result->patient->visit_info->weight }}</span>
                        <span>Kg</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Height:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        <span>{{ $sample_result->patient->visit_info->height }}</span>
                        <span>cm</span>
                    </div>
                </div>
            </div>
            <hr />

            <div>
                <div class="grid grid-cols-2 mb-4">
                    <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                        Test carried out:
                    </div>
                    <div class="px-2 py-2 dark:text-gray-400">
                        {{ $sample_result->test_service->catagory->catagory_name }}
                        ({{ $sample_result->test_service->test_name }})
                    </div>
                </div>

                <div>
                    <div class="grid grid-cols-2 mb-4">
                        <div class="px-4 py-2 text-base font-bold dark:text-gray-400">
                            Results obtained:
                        </div>
                        <div class="px-2 py-2 dark:text-gray-400">
                            {{ $sample_result->result->result }}({{ $sample_result->result->symbol }})
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
