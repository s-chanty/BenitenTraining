<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Role;
use Exception;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    public function index()
    {
        $list = Role::getList();
        return $this->success($list);
    }
    /**
     * Update resource
     *
     * @param UpdateRoleRequest $request
     * @return JsonResponse
     */
    public function edit(UpdateRoleRequest $request)
    {
        try {
            $role = Role::edit($request->all());
            return $this->success($role);
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }
}
