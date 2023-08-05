<x-app-layout>
    <x-slot name="title">
        Test Service
    </x-slot>
    <x-app.card>
        <x-slot name="banner">
            <div class="flex">
                <div class="flex-1">
                    Test Service
                </div>
                <div>
                    <x-app.back href="{{ route('test-services.index') }}" />
                </div>
            </div>
        </x-slot>

        <x-app.flash-message />
        
        <div>
            <!-- Form -->
            <form method="POST" action="{{ route('test-services.store') }}">
                @csrf
                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="test_name" value="{{ __('Test Name') }}" />
                        <x-jet-input class="md:w-2/3" id="test_name" type="text" name="test_name" :value="old('test_name')"
                            autofocus />
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="mb-4">
                        <x-jet-label for="price" value="{{ __('Price') }}" />
                        <x-jet-input class="md:w-2/3" id="price" type="text" name="price" :value="old('price')"
                            autofocus />
                    </div>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <x-jet-button class="ml-3">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
            <x-jet-validation-errors class="mt-4" />
        </div>
    </x-app.card>
</x-app-layout>
