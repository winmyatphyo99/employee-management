<?php

namespace App\GraphQL\Mutations;

use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeMutation
{
    public function importEmployees($_, array $args)
    {
        if (!isset($args['file'])) {
            throw new \Exception("File is required");
        }

        $file = $args['file'];

        Excel::import(new EmployeesImport, $file);

        return "Employees imported successfully";
    }
}
