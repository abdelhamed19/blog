<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','post_id','content'];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name'=>null,
            'email'=>'Default@null.com'
        ]);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    protected static function booted()
    {
        static::saving(function ($comment) {
            $comment->user_id = auth()->id();
        });
        static::addGlobalScope('deleting',function ($builder){
            $builder->where('user_id', '=', Auth::id());
        });
    }
}
