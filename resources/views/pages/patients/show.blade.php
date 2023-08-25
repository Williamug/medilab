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
        <dl class="mt-4">
            <div class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-in-component-ctn gap-6">
                <div style="--col-span-default: 1 / -1;" class="col-[--col-span-default]">
                    <section
                        class="bg-white shadow-sm fi-section rounded-xl ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10"
                        id="patient-info">
                        <header class="flex items-center px-6 py-4 overflow-hidden gap-x-3">

                            <div class="grid flex-1 gap-y-1">
                                <h3
                                    class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                                    Patient Info
                                </h3>

                            </div>
                        </header>

                        <div class="border-t border-gray-200 fi-section-content-ctn dark:border-white/10">
                            <div class="p-6 fi-section-content">
                                <dl>
                                    <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                        class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                        <div style="--col-span-default: span 1 / span 1;"
                                            class="col-[--col-span-default]">
                                            <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                                                <div class="flex-1 w-full">
                                                    <div>
                                                        <dl>
                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr));"
                                                                class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-in-component-ctn gap-6">
                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                    class="col-[--col-span-default]">
                                                                    <div>
                                                                        <dl>
                                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                                                                class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">
                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">
                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Patient number
                                                                                                    </span>
                                                                                                </dt>
                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">
                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->patient_number }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Full name
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->full_name }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Gender
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->gender }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        @if (!is_null($patient->date_of_birth))
                                                                                                            Date of
                                                                                                            birth
                                                                                                        @else
                                                                                                            Age
                                                                                                        @endif
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                    style="">
                                                                                                                    @if (!is_null($patient->date_of_birth))
                                                                                                                        {{ $patient->ageFromDob() }}
                                                                                                                        years
                                                                                                                    @else
                                                                                                                        {{-- @foreach ($patient->patient_visits->where('patient_id', $patient->id)->latest()->first() ?? '' as $patient_visit)
                                                                                                                            {{ $patient_visit->patient_age }}
                                                                                                                            years
                                                                                                                        @endforeach --}}
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </dl>

                                                                    </div>
                                                                </div>
                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                    class="col-[--col-span-default]">
                                                                    <div>
                                                                        <dl>
                                                                            <div style="--cols-default: repeat(1, minmax(0, 1fr));"
                                                                                class="grid grid-cols-[--cols-default] fi-in-component-ctn gap-6">
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Phone number
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->phone_number }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Email
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->email }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div style="--col-span-default: span 1 / span 1;"
                                                                                    class="col-[--col-span-default]">
                                                                                    <div class="fi-in-entry-wrp">

                                                                                        <div class="grid gap-y-2">
                                                                                            <div
                                                                                                class="flex items-center justify-between gap-x-3">
                                                                                                <dt
                                                                                                    class="inline-flex items-center fi-in-entry-wrp-label gap-x-3">


                                                                                                    <span
                                                                                                        class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                                                                        Residence
                                                                                                    </span>


                                                                                                </dt>

                                                                                            </div>

                                                                                            <div class="grid gap-y-2">
                                                                                                <dd class="">
                                                                                                    <div
                                                                                                        class="flex fi-in-affixes fi-in-text">

                                                                                                        <div
                                                                                                            class="flex-1 min-w-0">
                                                                                                            <div
                                                                                                                class="">

                                                                                                                <div>
                                                                                                                    <div class="fi-in-text-item inline-flex items-center gap-1.5 text-sm leading-6 text-gray-950 dark:text-white font-bold "
                                                                                                                        style="">

                                                                                                                        <div
                                                                                                                            class="">
                                                                                                                            {{ $patient->residence }}
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </dd>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </dl>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </dl>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </dl>

        <div>
            <header class="flex items-center px-6 pt-4 mt-4 overflow-hidden gap-x-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Test Orders
                    </h3>

                </div>
            </header>


            <div class="flex flex-col mt-2">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                            Lab Service
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Price (UGX.)
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Order Number

                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Order Status
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Payment Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($patient->test_orders as $test_order)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $test_order->lab_service->service_name }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $test_order->lab_service->price }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $test_order->order_number }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div
                                                    class="inline px-2 py-1 text-sm font-semibold text-yellow-500 border border-yellow-300 rounded gap-x-2 bg-yellow-100/60 dark:bg-gray-800">
                                                    {{ $test_order->order_status }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div
                                                    class="inline px-2 py-1 text-sm font-semibold text-red-500 border border-red-300 rounded gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                    {{ $test_order->payment_status }}
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <header class="flex items-center px-6 pt-4 mt-4 overflow-hidden gap-x-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Next of Kin info
                    </h3>

                </div>
            </header>


            <div class="flex flex-col mt-2">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                            Full Name
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Gender
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Relationship to Patient

                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Phone Number
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Residence
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($patient->patient_visits as $patient_visit)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $patient_visit->kin_full_name }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $patient_visit->kin_gender }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $patient_visit->patient_relation }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $patient_visit->kin_phone_number }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    {{ $patient_visit->kin_residence }}
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app.card>
</x-app-layout>
