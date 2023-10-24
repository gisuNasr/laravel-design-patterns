<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function list() : ?LengthAwarePaginator;
    public function showById(int $id) : ?User;
    public function store(array $data): ?User;
    public function update(int $id,array $data): ?User;
    public function deleteById(int $id);
}