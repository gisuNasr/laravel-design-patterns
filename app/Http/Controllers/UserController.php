<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositorySingleton;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = UserRepositorySingleton::getInstance();
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return $this->successResponse($users,'user list fetched successfully');
    }

}