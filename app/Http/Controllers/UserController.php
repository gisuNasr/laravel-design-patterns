<?php
namespace App\Http\Controllers;

use App\Repositories\Adapters\UserAdapter;
use App\Repositories\MySQL\MySQLUserRepository;
use App\Repositories\API\APIUserRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    private $userAdapter;

    public function __construct()
    {
        // Create an instance of MySQLUserRepository or APIUserRepository
        $mysqlUserRepository = new MySQLUserRepository();

        // Pass MySQLUserRepository to the UserAdapter constructor
        $this->userAdapter = new UserAdapter($mysqlUserRepository);
    }


    public function index()
    {
        $users = $this->userAdapter->getAllUsers();
        return $this->successResponse($users,'user list fetched successfully');
    }

    public function show($id)
    {
        $user = $this->userAdapter->getUserById($id);
        return $this->successResponse($user,'user info fetched successfully');

    }

    public function store(Request $request)
    {
        $userData = $request->all();
        $this->userAdapter->createUser($userData);
        return $this->successResponse([],'user created successfully');
    }

    public function update(Request $request, $id)
    {
        $userData = $request->all();
        $this->userAdapter->updateUser($id, $userData);
        return $this->successResponse([],'user updated successfully');
    }

    public function destroy($id)
    {
        $this->userAdapter->deleteUser($id);
        return $this->successResponse([],'user deleted successfully');
    }
}
