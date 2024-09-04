<?php
namespace App\Repositories;
use App\Models\User;
class UsersRepository extends Repository {
    public function __construct() {
        parent::__construct(new User());
    }
}