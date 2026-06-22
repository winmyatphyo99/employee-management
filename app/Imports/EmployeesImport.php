<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class EmployeesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|string',
            'address'    => 'required|string',
            'salary'     => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return null; // skip invalid rows safely
        }

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

    public function chunkSize(): int
    {
        return 1000;
    }
}
