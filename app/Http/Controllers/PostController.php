<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Posts\StorePostRequest;

class PostController extends Controller
{
    /**
     * Store resource
     *
     * @param StorePostRequest $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        try {
            $data = Post::createNew($request->all());
            return $this->success($data);
        } catch (Exception $e) {
            return $this->fail($e->getMessage(), 500);
        }
    }
}
