<?php
namespace App\Facades;
use App\Models\Permission;
use App\Repositories\PermissionRepository;
class Permissions {
    public static function loadPermissions($user_role) {
    $arr_permissions = Array();
    $perm = (new PermissionRepository())
    ->findByColumnWith('role_id', $user_role, ['resource']);
    foreach($perm as $item) {
    $arr_permissions[$item->resource->nome] = (boolean) $item->permission;
    }
    session(['user_permissions' => $arr_permissions]);
    }
    public static function isAuthorized($resource) {
    $permissions = session('user_permissions');
    return array_key_exists($resource, $permissions);
    }
    public static function test() {
    return "<h1>PermissionsFacade - Running!!</h1>";
    }
}