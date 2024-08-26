<?php
namespace App\Repositories\CommentRepository;

use App\Models\Comment;
use App\Http\Requests\comment\StoreCommentRequest;
use App\Http\Requests\comment\UpdateCommentRequest;

interface CommentRepositoryInterface
{
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request);

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment);

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment);
}
