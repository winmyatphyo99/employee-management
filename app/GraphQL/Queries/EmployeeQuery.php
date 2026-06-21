<?php

namespace App\GraphQL\Queries;

use App\Models\Employee;

class EmployeeQuery
{
    public function search($_, array $args)
    {
        return Employee::search($args['search'])
            ->paginate(
                $args['first'],
                ['*'],
                'page',
                $args['page'] ?? 1
            );
    }
}
