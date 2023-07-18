<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    protected $user = null;

    public function list() : LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function showById($id) : User
    {
        return User::findOrFail($id);
    }

    public function storeOrUpdate($id = null, $data = [] )
    {
        if(is_null($id)) {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make('password');
            $user->save();

            return $user;
        }

        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make('password');
        $user->save();

        return $user;
    }

    public function deleteById($id)
    {
        $user=User::findOrFail($id);
        return $user->delete();
    }
}