<x-master>
    <x-slot:title>
        Roles
    </x-slot:title>
    <x-card>
        <x-slot name="banner">
        </x-slot>
        <div>
            <div>
                @if ($errors->any())
                    <div class="p-4 bg-red-200 border border-red-400 rounded">
                        <x-validation-errors class="mb-4" />
                    </div>
                @endif

                <form method="POST" action="{{ route('assign-roles.update', $user) }}">
                    @csrf
                    @method('put')

                    <span class="mb-5 text-red-800 dark:text-red-300">Note: <span
                            class="text-gray-700 dark:text-gray-400">*
                            Denotes
                            Mandatory</span></span>

                    <div class="mt-8">
                        <!-- user-->
                        <div class="mt-4">
                            <x-label for="user_id" value="{{ __('Users') }}" />
                            <select id="user_id" name="user_id"
                                class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            </select>
                            <x-input-error for="user_id" />
                        </div>
                        <!-- /.user-->

                        <!-- role-->
                        <div class="mt-4">
                            <x-label for="role_id" value="{{ __('Roles') }}" />
                            <select id="role_id" name="role_id"
                                class="block w-1/2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-900 dark:bg-gray-700 dark:text-gray-400">
                                <option>--Select role--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error for="role_id" />
                        </div>
                        <!-- /.role-->

                    </div>
                    <div>
                        <x-button class="mt-4">
                            {{ __('Assign Role') }}
                        </x-button>
                    </div>
                </form>
            </div>

        </div>
    </x-card>
</x-master>
