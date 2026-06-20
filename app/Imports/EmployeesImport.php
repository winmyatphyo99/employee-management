<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Employee::updateOrCreate(
            [
                'email' => $row['email']
            ],
            [
                'first_name' => $row['first_name'],
                'last_name'  => $row['last_name'],
                'phone'      => $row['phone'],
                'address'    => $row['address'],
                'salary'     => $row['salary'],
            ]
        );
    }
}
