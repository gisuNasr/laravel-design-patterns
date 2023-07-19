<?php
namespace App\Http\Controllers;

use App\Repositories\Adapters\UserAdapter;
use App\Repositories\MySQL\MySQLUserRepository;
use App\Repositories\API\APIUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = $this->userAdapter->getUserById($id);
        return view('users.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $userData = $request->all();
        $this->userAdapter->createUser($userData);
        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        $userData = $request->all();
        $this->userAdapter->updateUser($id, $userData);
        return redirect()->route('users.show', ['user' => $id]);
    }

    public function destroy($id)
    {
        $this->userAdapter->deleteUser($id);
        return redirect()->route('users.index');
    }
}
