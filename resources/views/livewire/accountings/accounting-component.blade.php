<div class="mt-6">
    <div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('spacemen')" role="button" href="#"
                                            class="flex"> --}}
                                        Patient ID
                                        {{-- @include('partials.sort_icons', [
                                                'field' => 'spacemen',
                                            ])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Full Name
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Order ID
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col"
                                        class="px-12  py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        {{-- <a wire:click.prevent="sortBy('created_at')" role="button" href="#"
                                            class="flex"> --}}
                                        Total Amount (UGX.)
                                        {{-- @include('partials.sort_icons', ['field' => 'created_at'])
                                        </a> --}}
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient->patient_number }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $patient->full_name }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                <ul>
                                                    @foreach ($patient->test_results as $test_result)
                                                        <li class="list-disc border-b">
                                                            {{ $test_result->order_number }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>

                                        <td class="px-12 py-4 text-xl font-medium whitespace-nowrap">
                                            <div>
                                                @money($patient->test_results->sum('lab_service_price'))
                                            </div>
                                        </td>


                                        <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center item-center">
                                                <a href="{{ route('accountings.show', $patient) }}"
                                                    class="flex items-center justify-center w-1/2 px-5 py-2 mr-4 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">View Details</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
            {{ $patients->links() }}
        </div> --}}
    </div>
</div>
