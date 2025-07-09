<x-app-layout>
    <x-slot name="header">
        {{ __('Create User') }}
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <livewire:sba.user.user-form />
    </div>
</x-app-layout>