<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class UserQuery
{
    public function search($_, array $args)
    {
        $search = $args['search'] ?? '';

        return User::query()
            ->where(function ($query) use ($search) {
                $query->where('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(
                $args['first'] ?? 10,
                ['*'],
                'page',
                $args['page'] ?? 1
            );
    }
}
