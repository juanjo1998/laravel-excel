<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoiceExport implements FromCollection,Responsable,WithMapping
{
    use Exportable;

    // coleccion filtrada
    private $filters;

    // propiedades predeterminadas de la clase para definir nombre y extension
    private $fileName = 'invoices.csv';
    private $writerType = Excel::CSV;

    public function __construct($filters) {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Invoice::filter($this->filters)->get();
    }

    // este metodo recorre cada registro que definimos dentro del metodo collection, a cada registro le aplicamos el filtro deseado

    public function map($invoice):array
    {
        return [
            $invoice->serie,
            $invoice->correlative,
            $invoice->base,
            $invoice->iva,
            $invoice->total,
            $invoice->user->name,
            Date::dateTimeToExcel($invoice->created_at)
        ];
    }
}
