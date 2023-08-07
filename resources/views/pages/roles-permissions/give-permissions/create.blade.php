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
        <x-flash-message />
        <div>
            <livewire:give-permissions-to-role-component>
        </div>
    </x-card>
</x-master>
