<?php

namespace App\Repositories;

use App\Repositories\UserRepository;

class UserRepositorySingleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance(): UserRepository {
        if (!self::$instance) {
            self::$instance = new UserRepository();
        }

        return self::$instance;
    }
}