<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface {
public function getAllUsers();
public function getUserById($id);
public function createUser(array $userData);
public function updateUser($id, array $userData);
public function deleteUser($id);
}