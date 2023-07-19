<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\MySQLUserRepository;
use App\Repositories\MongoDBUserRepository;

class UserRepositoryFactory {
    public static function create($type): UserRepositoryInterface
    {
        switch ($type) {
            case 'mysql':
                return new MySQLUserRepository();
            case 'mongodb':
                return new MongoDBUserRepository();
            // Add more cases for other data sources if needed
            default:
                throw new \InvalidArgumentException("Invalid user repository type");
        }
    }
}