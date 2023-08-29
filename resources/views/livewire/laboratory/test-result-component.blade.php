<div class="mt-6">
    @foreach ($patients as $patient)
        {{-- @if ($patient->test_results->each()) --}}
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
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Specimen to be used
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Test ID
                                    </th>

                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Order Received Dated
                                    </th>

                                    {{-- <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($patient->test_results->where('order_status', 'received') as $test_result)
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

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                @if (!is_null($test_result->spacemens))
                                                    <ul>
                                                        @foreach ($test_result->spacemens as $spacemen)
                                                            <li class="ml-8 list-disc">
                                                                <span class="text-base">{{ $spacemen->spacemen }}</span>
                                                                <span class="ml-2">
                                                                    <a href="#"
                                                                        class="text-xs text-blue-500 underline hover:no-underline">Edit</a>
                                                                    <a href="#"
                                                                        class="text-xs text-blue-500 underline hover:no-underline">Delete</a>
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                        <a href="#"
                                                            wire:click="openAddSpacemenModal({{ $test_result->id }})"
                                                            class="ml-8 text-xs text-blue-500 underline hover:no-underline">Add
                                                            specimen</a>
                                                    </ul>
                                                @else
                                                    <a href="#"
                                                        wire:click="openAddSpacemenModal({{ $test_result->id }})"
                                                        class="text-lg text-blue-600 underline hover:no-underline">
                                                        Add Specimen
                                                    </a>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                {{ $test_result->test_identity ?? '---' }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <div>
                                                @if (!is_null($test_result->order_received_date))
                                                    {{ $test_result->order_received_date->format('D, d M Y | H:i:s') }}
                                                @endif
                                            </div>
                                        </td>

                                        {{-- <td>
                                            <div>
                                                <button
                                                    wire:click.prevent="openReceiveTestOrder({{ $test_result->id }})"
                                                    type="button"
                                                    class="flex px-2 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-6 h-6 pt-1 bi bi-arrow-repeat" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                                    </svg>
                                                    <span class="pt-1 ml-1 text-xs">A</span>
                                                </button>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}
    @endforeach


    <!-- add specimen -->
    @if ($isOpenAddSpacemen)
        <x-modal>
            <div>
                <x-slot name="title">
                    Add Specimen
                </x-slot>

                <x-slot name="content">
                    @if ($errors->any())
                        <x-jet-validation-errors class="mb-4" />
                    @endif
                    <form>
                        <input type="hidden" wire:model="test_result">
                        <!-- specimen -->
                        <div>
                            <div class="flex mb-2">
                                <select
                                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select "
                                    wire:model.lazy="spacemen_id.0">
                                    <option value="">-- select specimen --</option>
                                    @foreach ($specimens as $specimen)
                                        <option value="{{ $specimen->id }}">
                                            {{ $specimen->spacemen }}
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
                            <x-jet-input-error for="spacemen_id" />
                        </div>
                        <!-- /.specimen -->
                        @foreach ($inputs as $key => $value)
                            <!-- specimen -->
                            <div>
                                <div class="flex mb-2">
                                    <select
                                        class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-900 dark:text-gray-400 dark:bg-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-select"
                                        wire:model.lazy="spacemen_id.{{ $value }}">
                                        <option value="">-- select specimen --</option>
                                        @foreach ($specimens as $specimen)
                                            <option value="{{ $specimen->id }}">
                                                {{ $specimen->spacemen }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <x-jet-secondary-button class="block ml-2"
                                        wire:click.prevent="remove({{ $key }})">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </x-jet-secondary-button>
                                </div>
                                <x-jet-input-error for="spacemen_id" />
                            </div>
                            <!-- /.specimen -->
                        @endforeach
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-button class="mr-4" wire:click="addSpacemen" wire:loading.attr="disabled">
                        <span wire:loading.remove>{{ __('Save') }}</span>
                        <span wire:loading>{{ __('Saving...') }}</span>
                    </x-jet-button>

                    <x-jet-secondary-button wire:click="closeAddSpacemen" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
                </x-slot>
            </div>
        </x-modal>
    @endif
    <!-- add specimen -->

    <!-- receive test -->
    @if ($isOpenReceiveTestOrder)
        <x-modal>
            <div>
                <x-slot name="title">
                    Receive Order
                </x-slot>

                <x-slot name="content">
                    <form>
                        <!-- hidden field-->
                        <input type="hidden" wire:model="test_order_id">
                        <div class="mb-4">
                            <div class="mb-2 text-lg font-bold text-center">
                                Receive Test Order
                            </div>
                            <div class="text-center">
                                Are you sure you want to do this?
                            </div>
                        </div>
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-button class="flex items-center justify-center w-full mr-4" wire:click="receiveOrder"
                        wire:loading.attr="disabled">
                        {{ __('Receive Test Order') }}
                    </x-jet-button>

                    <x-jet-secondary-button class="flex items-center justify-center w-full"
                        wire:click="closeReceiveTestOrder" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
                </x-slot>
            </div>
        </x-modal>
    @endif
    <!-- receive test -->
</div>
