<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentosPolicy
{
    use HandlesAuthorization;

    public function __construct() {
    }

    public function index() {
        return PermissionController::isAuthorized('documentos.index');
    }

    public function create() {
        return PermissionController::isAuthorized('documentos.create');
    }

    public function show() {
        return PermissionController::isAuthorized('documentos.show');
    }
    
}