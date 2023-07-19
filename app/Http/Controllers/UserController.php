<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\ApiResponse;

class UserController extends Controller
{
    use ApiResponse;
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->list();

        return $this->successResponse($users,"User list fetched successfully");
    }

    public function store(UserCreateRequest $request)
    {

        $data = $request->only(['name','email','password']);
        $this->user->storeOrUpdate($id = null, $data);

        return $this->successResponse([], "User added successfully!");
    }

    public function show($id)
    {
        $user = $this->user->showById($id);

        return $this->successResponse($user, "User fetched successfully!");
    }

    public function update(UserUpdateRequest $request, $id)
    {

        $data = $request->only(['name','email']);
        $this->user->storeOrUpdate($id, $data);

        return $this->successResponse([], "User updated successfully!");
    }

    public function destroy($id)
    {
        $this->user->deleteById($id);
        return $this->successResponse([], "User deleted successfully!");

    }
}
