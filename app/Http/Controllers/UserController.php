<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryBuilder;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    public function index(Request $request)
    {
        $userRepositoryBuilder = new UserRepositoryBuilder();

        if ($request->has('name')) {
            $userRepositoryBuilder->whereName($request->input('name'));
        }

        if ($request->has('email')) {
            $userRepositoryBuilder->whereEmail($request->input('email'));
        }

        $users = $userRepositoryBuilder->get();

        return $this->successResponse($users,'user list fetched successfully');
    }

}
