<?php
namespace App\Repositories\CommentRepository;

use App\Models\Post;
use App\Models\Comment;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\comment\StoreCommentRequest;
use App\Http\Requests\comment\UpdateCommentRequest;

class CommentRepositoryClass
{
    public function index()
    {
        $comments = Comment::with('user','post')->latest()->paginate();
        return $comments;
    }
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        try {
            $comment = Comment::create($data);
            $post = Post::find($comment->post_id);
            Notification::send($post->user, new CommentNotification($comment, $post));
            return $comment;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        try {
            $comment = Comment::with('comments','user')->find($id);
            return $comment;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function update(UpdateCommentRequest $request, $id)
    {
        $data = $request->validated();
        try {
            $comment = Comment::find($id);
            $comment->update($data);
            return $comment;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::find($id);
            $comment->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
