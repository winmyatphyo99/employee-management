<?php

namespace App\Repositories\Contracts;

interface EmployeeRepositoryInterface extends BaseRepositoryInterface
{
    public function all($search = null);
}
