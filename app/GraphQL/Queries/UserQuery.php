<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class UserQuery
{
    public function search($_, array $args)
    {
        return User::search($args['search'])
            ->paginate(
                $args['first'],
                ['*'],
                'page',
                $args['page'] ?? 1
            );
    }
}
