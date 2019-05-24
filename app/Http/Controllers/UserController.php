<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Requests;
use App\Http\Requests\Users\StoreUserRequest;

class UserController extends Controller
{

    /**
     * Get list resource
     *
     * @return JsonResponse
     */
    public function index()
    {
        $list = User::getList();
        return $this->success($list);
    }

    /**
     * Store resource
     *
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::createNew($request->all());
            DB::commit();
            return $this->success($user);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->fail($e->getMessage(), 500);
        }
    }

    public function edit(StoreUserRequest $request) {
        try {
            $role = User::edit($request->all());
            return $this->success($role);
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }
}
