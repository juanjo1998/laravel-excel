<div class="space-y-6">
    @dump($filters)
    <!-- Filters Section -->
    <div class="bg-white rounded-lg p-6 shadow-md">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold mb-4 ">Generate Reports</h2>

            <x-button wire:click="generateReport">Generate</x-button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="serie" class="block text-sm font-medium text-gray-700">Serie</label>
                <select wire:model.live="filters.serie" id="serie" name="serie"
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm">
                    <option value="">All</option>
                    <option value="F001">F001</option>
                    <option value="B001">B001</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">From N.</label>
                <x-input wire:model.live="filters.fromNumber" type="text" class="w-full" placeholder="Enter value" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">To N.</label>
                <x-input wire:model.live="filters.toNumber" type="text" class="w-full" placeholder="Enter value" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">From Date</label>
                <x-input wire:model.live="filters.fromDate" type="date" class="w-full" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">To Date</label>
                <x-input wire:model.live="filters.toDate" type="date" class="w-full" />
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Serie</th>
                        <th scope="col" class="px-6 py-3">Correlative</th>
                        <th scope="col" class="px-6 py-3">Base</th>
                        <th scope="col" class="px-6 py-3">IVA</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $invoice->id }}</td>
                            <td class="px-6 py-4">{{ $invoice->serie }}</td>
                            <td class="px-6 py-4">{{ $invoice->correlative }}</td>
                            <td class="px-6 py-4">COP {{ number_format($invoice->base, 2) }}</td>
                            <td class="px-6 py-4">COP {{ number_format($invoice->iva, 2) }}</td>
                            <td class="px-6 py-4">COP {{ number_format($invoice->total, 2) }}</td>
                            <td class="px-6 py-4">{{ $invoice->created_at->format('d/m/y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Section -->
    <div class="mt-4">
        @if ($invoices->hasPages())
            {{ $invoices->links() }}
        @endif
    </div>
</div>
