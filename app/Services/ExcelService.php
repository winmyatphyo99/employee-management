<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;

class ExcelService
{
    public function exportEmployees()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function importEmployees($file)
    {
        Excel::import(new EmployeesImport, $file);
    }
}
