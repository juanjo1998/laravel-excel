<x-app-layout>
    <x-slot name="header">
        Export Invoice
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('filter-invoices')
            </div>
        </div>
    </div>
</x-app-layout>
