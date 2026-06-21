<?php

namespace App\GraphQL\Queries;

use App\Models\Employee;

class EmployeeQuery
{
    public function search($_, array $args)
    {
        return Employee::query()
            ->where(function ($query) use ($args) {
                $query->where('first_name', 'like', '%' . $args['search'] . '%')
                    ->orWhere('last_name', 'like', '%' . $args['search'] . '%')
                    ->orWhere('email', 'like', '%' . $args['search'] . '%');
            })
            ->paginate(
                $args['first'],
                ['*'],
                'page',
                $args['page'] ?? 1
            );
    }
}
