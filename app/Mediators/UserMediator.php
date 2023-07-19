<?php
namespace App\Mediators;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class UserMediator {
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(array $userData)
    {
        // Validate user data before creating
        $validator = Validator::make($userData, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return ['error' => $validator->errors()->first()];
        }

        return $this->userRepository->createUser($userData);
    }

    public function updateUser($id, array $userData)
    {
        // Validate user data before updating
        $validator = Validator::make($userData, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        if ($validator->fails()) {
            return ['error' => $validator->errors()->first()];
        }

        return $this->userRepository->updateUser($id, $userData);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
