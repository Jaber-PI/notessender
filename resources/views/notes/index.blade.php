<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    @php
        $notes = Auth::user()->notes;
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <x-button primary href="{{ route('notes.create') }}">
                            {{ __("Create New Note!") }}
                        </x-button>
                    </div>
                    <livewire:notes.show-notes lazy>
                </div>
        </div>
    </div>
</x-app-layout>
