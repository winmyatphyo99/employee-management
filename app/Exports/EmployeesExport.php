<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Employee::query()->select(
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'address',
            'salary'
        );
    }

    public function headings(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'address',
            'salary',
        ];
    }
}
