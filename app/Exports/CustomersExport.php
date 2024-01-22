<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    private $fileName = 'customers_name.xlsx';

    public function __construct(public string $name)
    {
    }

    public function query()
    {
        return Customer::query()->select('name', 'email', 'created_at');
    }

    public function map($customer): array
    {
        return [
            ucfirst($customer->name),
            $customer->email,
            $customer->created_at->format('Y-m-d'),
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'created_at',
        ];
    }

    public function prepareRows($rows)
    {
        return $rows->transform(function ($customer) {
            $customer->name = ucfirst($customer->name);
            $customer->created_at = $customer->created_at->format('Y-m-d');

            return $customer;
        });
    }
}
