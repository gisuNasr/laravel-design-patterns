<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function list() : LengthAwarePaginator;
    public function showById($id) : User;
    public function storeOrUpdate( $id = null, $collection = [] );
    public function deleteById($object);
}