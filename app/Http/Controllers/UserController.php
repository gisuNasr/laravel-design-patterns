<?php

// UserController.php
namespace App\Http\Controllers;

use App\Mediators\UserMediator;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    private $userMediator;

    public function __construct(UserMediator $userMediator)
    {
        $this->userMediator = $userMediator;
    }

    public function index()
    {
        $users = $this->userMediator->getAllUsers();
        return $this->successResponse($users,'users fetched successfully');
    }

    public function show($id)
    {
        $user = $this->userMediator->getUserById($id);
        return $this->successResponse($user,'user info fetched successfully');
    }

    public function store(Request $request)
    {
        $userData = $request->all();
        $result = $this->userMediator->createUser($userData);

        if (isset($result['error'])) {
            return $this->errorResponse([],'Oops! something went wrong');

        }

        return $this->successResponse([],'user stored successfully');
    }

    public function update(Request $request, $id)
    {
        $userData = $request->all();
        $result = $this->userMediator->updateUser($id, $userData);

        if (isset($result['error'])) {
            return $this->errorResponse([],'Oops! something went wrong');
        }

        return $this->successResponse([],'user updated successfully');
    }

    public function destroy($id)
    {
        $this->userMediator->deleteUser($id);
        return $this->successResponse([],'user deleted successfully');
    }
}
