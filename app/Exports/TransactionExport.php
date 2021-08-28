<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromQuery, WithHeadings, ShouldAutoSize
{

    public function query()
    {
        return Transaction::latest();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Total',
            'Created At',
            'Updated At',
        ];
    }
}
