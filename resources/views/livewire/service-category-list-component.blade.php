<div>
    <div>
        <div class="flex flex-col my-1 sm:flex-row">
            <div class="relative flex-1 block">
                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                        <path
                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                        </path>
                    </svg>
                </span>
                <input wire:model.defer="search" placeholder="Search"
                    class="block w-1/2 py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded appearance-none sm:rounded-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
            <div>
                <x-app.export-buttons href="{{ route('export-categories.index') }}">
                    Excel
                </x-app.export-buttons>

                <x-app.export-buttons href="{{ route('deleted-categories.index') }}">
                    Archive
                </x-app.export-buttons>
                @can('add category')
                    <x-app.a href="#" wire:click="openCreateModal">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 bi bi-plus"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </span>
                        Add Service Category
                    </x-app.a>
                @endcan
            </div>
        </div>
        <div class="px-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('category_name')" role="button" href="#"
                                    class="flex">
                                    Category Name
                                    @include('partials.sort_icons', ['field' => 'category_name'])
                                </a>
                            </th>
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                <a wire:click.prevent="sortBy('description')" role="button" href="#"
                                    class="flex">
                                    Description
                                    @include('partials.sort_icons', ['field' => 'description'])
                                </a>
                            </th>
                            {{-- @can('View category') --}}
                            <th
                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                Actions
                            </th>
                            {{-- @endcan --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service_categories as $category)
                            <tr>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $category->category_name }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $category->description }}
                                    </p>
                                </td>


                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                    <div class="flex">
                                        <div class="flex">

                                            @can('edit category')
                                                <x-app.a wire:click.prevent="openEditModal({{ $category->id }})"
                                                    href="#" class="px-2 bg-green-700 hover:bg-green-900"
                                                    title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="w-4 h-4 mr-3 text-white bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                    Edit
                                                </x-app.a>
                                            @endcan
                                        </div>
                                        @can('delete category')
                                            <div>
                                                <button wire:click.prevent="openDeleteModal({{ $category->id }})"
                                                    title="Delete"
                                                    class="px-2 py-1 ml-2 text-white uppercase bg-red-700 rounded hover:bg-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="flex w-4 h-4 mr-3 text-white bi bi-trash hover:text-white"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </div>
                                        @endcan
                                    </div>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                    <div class="inline-flex mt-2 xs:mt-0">
                        {{ $service_categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.service-category-modal')
</div>
