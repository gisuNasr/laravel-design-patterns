<?php

namespace App\Repositories\Adapters;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserAdapter implements UserRepositoryInterface {
    private $adapter;

    public function __construct(UserRepositoryInterface $adapter) {
        $this->adapter = $adapter;
    }

    public function getAllUsers() {
        return $this->adapter->getAllUsers();
    }

    public function getUserById($id) {
        return $this->adapter->getUserById($id);
    }

    public function createUser(array $userData) {
        return $this->adapter->createUser($userData);
    }

    public function updateUser($id, array $userData) {
        return $this->adapter->updateUser($id, $userData);
    }

    public function deleteUser($id) {
        return $this->adapter->deleteUser($id);
    }
}
