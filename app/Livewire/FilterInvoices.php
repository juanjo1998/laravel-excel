<?php

namespace App\Livewire;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

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
        //return Excel::download(new InvoiceExport);

        return new InvoiceExport($this->filters);
    }

    public function render()
    {
        $invoices = Invoice::filter($this->filters)->get();

        return view('livewire.filter-invoices', compact('invoices'));
    }
}
