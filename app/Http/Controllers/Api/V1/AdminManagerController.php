<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Plant;
use App\User;
use App\Permission;
use App\Role;

class AdminManagerController extends Controller
{
    /**
     * Attach permission to the role.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'role_id'
     * int 'permission_id'
     * @return \Illuminate\Http\Response
     */
    function attachPermission(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->permissions()->attach($request->permission_id);
        return response()->json('Attached '.$request->permission_id.' permission id to the '.$request->role_id.' role id.',200);
    }

    /**
     * Attach role to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'user_id'
     * int 'role_id'
     * @return \Illuminate\Http\Response
     */
    function attachRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->roles()->attach($request->role_id);
        return response()->json('Attached '.$request->role_id.' role id to the '.$request->user_id.' user id.',200);
    }

    /**
     * Sync permission to the role.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'role_id'
     * array 'permissions'
     * bool 'detaching' - default: false
     * @return \Illuminate\Http\Response
     */
    function syncPermission(Request $request)
    {
        $detaching = $request->has('detaching') ? $request->detaching : false;

        $role = Role::find($request->role_id);
        $role = $role->permissions()->sync($request->permissions,$detaching);

        return response()->json($role,200);
    }

    /**
     * Sync role to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'user_id'
     * array 'roles'
     * bool 'detaching' - default: false
     * @return \Illuminate\Http\Response
     */
    function syncRole(Request $request)
    {
        $detaching = $request->has('detaching') ? $request->detaching : false;

        $user = User::find($request->user_id);
        $user = $user->roles()->sync($request->roles,$detaching);

        return response()->json($user,200);
    }

    /**
     * Detach permissions to the role.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'role_id'
     * int|array|null 'permissions' - default: null
     * @return \Illuminate\Http\Response
     */
    function detachPermission(Request $request)
    {
        $permissions = $request->has('permissions') ? $request->permissions : null;
        $role = Role::find($request->role_id);
        $role = $role->permissions()->detach($permissions);
        return response()->json($role,200);
    }

    /**
     * Detach roles to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * int 'user_id'
     * int|array|null 'role' - default: null
     * @return \Illuminate\Http\Response
     */
    function detachRole(Request $request)
    {
        $roles = $request->has('roles') ? $request->roles : null;
        $user = User::find($request->user_id);
        $user = $user->roles()->detach($roles);
        return response()->json($user,200);
    }

}
