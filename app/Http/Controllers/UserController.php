<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryFactory;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;

    private $userRepository;

    public function __construct()
    {
// Create a MySQLUserRepository instance
// $this->userRepository = UserRepositoryFactory::create('mysql');

// Create a MongoDBUserRepository instance
        $this->userRepository = UserRepositoryFactory::create('mongodb');
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return $this->successResponse($users, 'user list fetched successfully');
    }

}
