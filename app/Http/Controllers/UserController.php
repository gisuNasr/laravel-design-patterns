<?php

// UserController.php
namespace App\Http\Controllers;

use App\Repositories\UserContext;
use App\Repositories\Strategies\MySQLUserRepository;
use App\Repositories\Strategies\MongoDBUserRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    public function index()
    {
        // Use MySQL strategy
        $userRepository = new MySQLUserRepository();
        $userContext = new UserContext($userRepository);
        $users = $userContext->getAllUsers();

        // Or use MongoDB strategy
        // $userRepository = new MongoDBUserRepository();
        // $userContext = new UserContext($userRepository);
        // $users = $userContext->getAllUsers();

        return $this->successResponse($users,'user list fetched successfully');
    }


}
