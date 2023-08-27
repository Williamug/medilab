<div class="mt-6">
    @foreach ($patients as $patient)
        <div class="mt-4">
            {{ $patient->full_name }}
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
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Payment Status
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Lab Service
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Price (UGX.)
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @if ($patient->test_orders->isNotEmpty())
                                    @foreach ($patient->test_orders->where('payment_status', 'unpaid') as $test_order)
                                        {{-- {{ dd($test_order) }} --}}
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $test_order->order_number }}
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div
                                                    class="inline px-2 py-1 text-sm font-normal text-red-500 border border-red-300 rounded gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                    {{ $test_order->payment_status }}
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $test_order->lab_service->service_name }}
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    @money($test_order->lab_service->price)
                                                </div>
                                            </td>

                                            {{-- <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center item-center">
                                                <!-- view-->
                                                <a href="{{ route('patients.show', $patient) }}"
                                                    class="flex px-2 mr-2 text-sm text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">View</span>
                                                </a>

                                                <!-- edit -->
                                                <a wire:click.prevent="openEditModal({{ $patient->id }})"
                                                    href="#"
                                                    class="flex px-2 mr-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">Edit</span>
                                                </a>


                                                <!-- delete -->
                                                <button wire:click.prevent="openDeleteModal({{ $patient->id }})"
                                                    type="button"
                                                    class="flex px-2 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4 pt-1" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">Delete</span>
                                                </button>
                                            </div>
                                        </td> --}}
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            {{-- {{ $patient->test_orders->each(fn())->lab_service->sum('price') }} --}}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div
                            class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                            <div class="inline-flex mt-2 xs:mt-0">
                                {{-- {{ $test_orders->links() }} --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
