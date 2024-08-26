<?php
namespace App\Repositories\PostRepository;

use App\Http\Requests\post\StorePostRequest;
use App\Http\Requests\post\UpdatePostRequest;
use App\Models\Post;

interface PostRepositoryInterface
{
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request);

    /**
     * Display the specified resource.
     */
    public function show(Post $post);

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post);
}
