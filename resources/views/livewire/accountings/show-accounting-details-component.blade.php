<div class="mt-6">
    <div>
        <div class="flex mt-12">
            <div class="flex-1">
                <div class="flex ml-4 text-lg font-semibold uppercase">
                    <div class="mr-3">
                        Patient Name:
                    </div>
                    <div>
                        {{ $patient->full_name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-2">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Order Number
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Lab Service
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Payment Status
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Price (UGX.)
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patient->test_results as $test_result)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->order_number }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->lab_service->service_name }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            @if ($test_result->payment_status == 'unpaid')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-red-500 border border-red-300 rounded gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                    {{ $test_result->payment_status }}
                                                </div>
                                            @elseif($test_result->payment_status == 'paid')
                                                <div
                                                    class="inline px-1 text-xs font-normal text-green-500 border border-green-300 rounded gap-x-2 bg-green-100/60 dark:bg-gray-800">
                                                    {{ $test_result->payment_status }}
                                                </div>
                                            @endif
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                @money($test_result->lab_service_price)
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                    <td class="px-4 py-4 text-sm font-bold uppercase whitespace-nowrap">
                                        Total</td>
                                    <td class="py-4 text-sm font-medium uppercase whitespace-nowrap">
                                        <span class="text-xl">
                                            UGX.
                                        </span>
                                        <span class="text-2xl underline decoration-double">
                                            @money($patient->test_results->sum('lab_service_price'))
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="flex mt-2">
                        <div class="flex-1"></div>
                        @if ($test_result->payment_status == 'unpaid')
                            <a href="#" wire:click="openPayBillModal({{ $patient->id }})"
                                class="flex items-center justify-center w-1/2 px-5 py-2 mr-32 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-4 h-4 bi bi-cash-stack" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    <path
                                        d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                                </svg>
                                <span>Pay Bills</span>
                            </a>
                        @elseif($test_result->payment_status == 'paid')
                            <a href="#" wire:click="openPayBillModal({{ $patient->id }})"
                                class="flex items-center justify-center w-1/2 px-5 py-2 mr-32 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-4 h-4 bi bi-printer" viewBox="0 0 16 16">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                </svg>
                                <span>Print Receipt</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.pay-bill-modal');
</div>
