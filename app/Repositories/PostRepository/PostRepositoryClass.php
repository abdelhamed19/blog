<?php
namespace App\Repositories\PostRepository;

use App\Models\Post;
use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\post\UpdatePostRequest;

class PostRepositoryClass implements PostRepositoryInterface
{
    public function index()
    {
        $posts = Post::with('comments','user')->latest()->paginate(10);
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        try {
            $post = Post::create($data);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        try {
            $post = Post::with('comments','user')->find($post->id);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        try {
            $post->update($data);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
