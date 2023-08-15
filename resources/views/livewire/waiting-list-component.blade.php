<div>
    @foreach ($waiting_patients as $patient)
        <div class="mb-8">
            <div class="flex mt-8 mb-4 ml-4">
                <div class="mr-8">
                    <div class="text-xs font-bold">Reg. No.</div>
                    <div class="text-lg uppercase">
                        {{ $patient->registration_number }}
                    </div>
                </div>
                <div>
                    <div class="text-xs font-bold">Full Name</div>
                    <div class="text-lg uppercase">
                        {{ $patient->full_name }}
                    </div>
                </div>
            </div>
            <div class="flex flex-col my-2 sm:flex-row">
                <div class="px-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Lab service Category
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Lab service
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Spacemen
                                    </th>

                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Status
                                    </th>

                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Test Identity
                                    </th>
                                    <th
                                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200 bg-gray-50">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patient->test_results as $test_result)
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $test_result->lab_service->service_category->category_name }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $test_result->lab_service->service_name }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @if (!is_null($test_result->spacemen))
                                                    {{ $test_result->spacemen }}
                                                @else
                                                    <a wire:click.prevent="openAddSpacemenModal({{ $test_result->id }})"
                                                        href="#"
                                                        class="text-blue-700 hover:underline hover:text-blue-900">
                                                        Add Spacemen
                                                    </a>
                                                    <!-- spacemen id -->
                                                @endif
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $test_result->result_status }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $test_result->test_identity }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @if (!is_null($test_result->test_identity))
                                                    <x-app.a wire:click.prevent="openEditModal({{ $test_result->id }})"
                                                        href="#" title="Add Results">
                                                        Results
                                                    </x-app.a>
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endforeach
    @include('partials.add-spacemen-modal')
</div>
