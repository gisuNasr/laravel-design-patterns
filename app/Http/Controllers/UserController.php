<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\ApiResponse;

class UserController extends Controller
{
    use ApiResponse;

    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $response = $this->repository->list();

        if (is_null($response)) {
            return $this->errorResponse([],"Server Error!!! Something went wrong while fetching user list");
        }
        return $this->successResponse($response, "User list fetched successfully");
    }


    public function store(UserCreateRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $response=$this->repository->store($data);
        if (is_null($response)){
            return $this->errorResponse([], "Something went wrong!");
        }
        return $this->successResponse($response, "User added successfully!");
    }

    public function show($id)
    {
        $response = $this->repository->showById($id);

        if (is_null($response)) {
            return $this->errorResponse([],"User NotFound!",404);
        }
        return $this->successResponse($response, "User fetched successfully");
    }

    public function update(UserUpdateRequest $request, $id)
    {

        $data = $request->only(['name', 'email', 'password']);
        $response=$this->repository->update($id, $data);

        if (is_null($response)){
            return $this->errorResponse([],"User NotFound!");
        }
        return $this->successResponse($response, "User updated successfully!");
    }

    public function destroy($id)
    {
        $response=$this->repository->deleteById($id);

        if (is_null($response)) {
            return $this->errorResponse([],"User NotFound!");
        }
        return $this->successResponse([], "User deleted successfully!");
    }
}
