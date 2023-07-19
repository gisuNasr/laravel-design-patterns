<?php

// UserContext.php
namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserContext {
    private $strategy;

    public function __construct(UserRepositoryInterface $strategy) {
        $this->strategy = $strategy;
    }

    public function getAllUsers() {
        return $this->strategy->getAllUsers();
    }

    public function getUserById($id) {
        return $this->strategy->getUserById($id);
    }

    public function createUser(array $userData) {
        return $this->strategy->createUser($userData);
    }

    public function updateUser($id, array $userData) {
        return $this->strategy->updateUser($id, $userData);
    }

    public function deleteUser($id) {
        return $this->strategy->deleteUser($id);
    }
}
