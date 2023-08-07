<x-master>
    <x-slot:title>
        <div class="flex">
            <div class="flex-1">
                Roles
            </div>
            <div>
                <x-back href="{{ route('roles.index') }}" />
            </div>
        </div>
    </x-slot:title>
    <x-card>
        <x-slot name="banner">
        </x-slot>
        <div>
            @if ($errors->any())
                <div class="p-4 bg-red-200 border border-red-400 rounded">
                    <x-validation-errors class="mb-4" />
                </div>
            @endif

            <form method="POST" action="{{ route('roles.store') }}">
                @csrf

                <span class="mb-5 text-red-800 dark:text-red-300">Note: <span class="text-gray-700 dark:text-gray-400">*
                        Denotes
                        Mandatory</span></span>

                <div class="mt-8">
                    <!-- role -->
                    <div class="mt-3 mb-3">
                        <x-label for="name" value="{{ __('Role Name *') }}" />
                        <x-input id="name" class="block w-1/2 mt-1" type="text" name="name" :value="old('name')"
                            autofocus autocomplete="name" />
                        <x-input-error for="name" />
                    </div>
                    <!-- /.role -->
                </div>
                <div>
                    <x-button class="mt-4">
                        {{ __('Add Role') }}
                    </x-button>
                </div>
            </form>

        </div>
    </x-card>
</x-master>
