<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Helpers\HTTPResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
use App\Repositories\PostRepository\PostRepositoryClass;

class PostController extends Controller
{
    use HTTPResponse;
    public $postRepositoryClass;
    public function __construct(PostRepositoryClass $postRepositoryClass)
    {
        $this->postRepositoryClass = $postRepositoryClass;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepositoryClass->index();
        if ($posts->isEmpty()) {
            return $this->wrongRequest('No Posts yet', 404);
        }
        return $this->successRequest($posts,'Posts retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->postRepositoryClass->store($request);
        if (is_string($post)) {
            return $this->wrongRequest($post, 400);
        }
        return $this->successRequest($post, 'Post created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = $this->postRepositoryClass->show($post);
        if (is_string($post)) {
            return $this->wrongRequest($post, 400);
        }
        return $this->successRequest($post, 'Post retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = $this->postRepositoryClass->update($request, $post);
        if (is_string($post)) {
            return $this->wrongRequest($post, 400);
        }
        return $this->successRequest($post, 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = $this->postRepositoryClass->destroy($post);
        if (is_string($post)) {
            return $this->wrongRequest(null, 404);
        }
        return $this->successRequest(null, 'Post deleted successfully');
    }
}
