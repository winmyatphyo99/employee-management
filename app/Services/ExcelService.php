<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Illuminate\Support\Facades\Log;

class ExcelService
{
    public function exportEmployees()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function importEmployees($file)
    {
        try {
            Excel::import(new EmployeesImport, $file);
        } catch (\Exception $e) {
            Log::error('Employee Import Failed: ' . $e->getMessage());

            throw new \Exception('Employee import failed. Please check file format.');
        }
    }
}
