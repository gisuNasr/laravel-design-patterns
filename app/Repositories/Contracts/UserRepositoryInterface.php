<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface {
    public function getAllUsers();
    public function getUserById($id);
    public function createUser(array $userData);
    public function updateUser($id, array $userData);
    public function deleteUser($id);
}