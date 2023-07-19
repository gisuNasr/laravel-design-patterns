<?php

// UserRepositoryBuilder.php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepositoryBuilder
{
    private $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = User::query();
    }

    public function whereName($name): self
    {
        $this->queryBuilder->where('name', $name);
        return $this;
    }

    public function whereEmail($email): self
    {
        $this->queryBuilder->where('email', $email);
        return $this;
    }


    public function get()
    {
        return $this->queryBuilder->get();
    }
}
