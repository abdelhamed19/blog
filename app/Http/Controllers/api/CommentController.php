<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\HTTPResponse;
use App\Http\Controllers\Controller;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\comment\StoreCommentRequest;
use App\Http\Requests\comment\UpdateCommentRequest;
use App\Repositories\CommentRepository\CommentRepositoryClass;

class CommentController extends Controller
{
    use HTTPResponse;
    public $commentRepositoryClass;
    public function __construct(CommentRepositoryClass $commentRepositoryClass)
    {
        $this->commentRepositoryClass = $commentRepositoryClass;
    }
    public function store(StoreCommentRequest $request)
    {
        $comment = $this->commentRepositoryClass->store($request);
        if (is_string($comment)) {
            return $this->wrongRequest('Can not create Comment', 500);
        }
        return $this->successRequest($comment, 'Comment created successfully', 201);
    }
    public function show($id)
    {
        $comment = $this->commentRepositoryClass->show($id);
        if (is_string($comment)) {
            return $this->wrongRequest('Comment Not found', 400);
        }
        return $this->successRequest($comment, 'Comment retrieved successfully');
    }
    public function update(UpdateCommentRequest $request, $id)
    {
        $comment = $this->commentRepositoryClass->update($request, $id);
        if (is_string($comment)) {
            return $this->wrongRequest('Unable to update', 400);
        }
        return $this->successRequest($comment, 'Comment updated successfully');
    }
    public function destroy($id)
    {
        $comment = $this->commentRepositoryClass->destroy($id);
        if (is_string($comment)) {
            return $this->wrongRequest('Unable to delete', 400);
        }
        return $this->successRequest($comment, 'Comment deleted successfully');
    }
}
