<?php
namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function getAllUsers() {
        return User::all();
    }

    public function getUserById($id) {
        return User::find($id);
    }

    public function createUser(array $userData) {
        return User::create($userData);
    }

    public function updateUser($id, array $userData) {
        $user = User::find($id);
        if ($user) {
            $user->update($userData);
            return $user;
        }
        return null;
    }

    public function deleteUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
