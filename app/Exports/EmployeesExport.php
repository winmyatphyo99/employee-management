<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::select(
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'address',
            'salary'
        )->get();
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
