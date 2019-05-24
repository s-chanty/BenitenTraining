<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Response success request as json format
     *
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data, $code = 200)
    {
        return response()->json(['success' => true, 'data' => $data], $code);
    }

    /**
     * Response unsuccess request as json format
     *
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function fail($data, $code = 400)
    {
        return response()->json(['success' => false, 'message' => $data], $code);
    }
}
