<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected static function booted()
    {
        static::saving(function ($post) {
            $post->user_id = auth()->id();
        });
        static::addGlobalScope('deleting',function ($builder){
            $builder->where('user_id', '=', Auth::id());
        });
    }
}
