<?php

namespace App\Livewire;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class FilterInvoices extends Component
{
    use WithPagination;

    public $filters = [
        'serie' => '',
        'fromNumber' => '',
        'toNumber' => '',
        'fromDate' => '',
        'toDate' => '',
    ];

    public function generateReport()
    {
        return Excel::download(new InvoiceExport(), 'invoices.xlsx');
    }

    public function render()
    {
        $invoices = Invoice::filter($this->filters)->get();

        return view('livewire.filter-invoices', compact('invoices'));
    }
}
