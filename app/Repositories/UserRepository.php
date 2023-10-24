<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    protected $user = null;

    public function list() :?LengthAwarePaginator
    {
        try {
            $users=User::paginate(10);
            return $users;
        }catch (QueryException $e){
            Log::error("Error while fetching user list: " . $e->getMessage());
            return null;
        }
    }

    public function showById(int $id) : ?User
    {
        try {
            return User::find($id);
        }catch (QueryException $e){
            Log::error("Error while fetching the user: " . $e->getMessage());
            return null;
        }
    }

    public function store(array $data): ?User
    {
        try {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            return $user;
        } catch (\Exception $e) {
            Log::error("Error while storing user: " . $e->getMessage());
            return null;
        }
    }

    public function update(int $id, array $data): ?User
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $data['name'];
            $user->email = $data['email'];

            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            $user->save();

            return $user;
        } catch (\Exception $e) {
            Log::error("Error while updating user: " . $e->getMessage());
            return null;
        }
    }

    public function deleteById($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return true;
        } catch (\Exception $e) {
            Log::error("Error while deleting user: " . $e->getMessage());
            return null;
        }
    }
}