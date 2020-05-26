<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body'
    ];

    /**
     * Get the author of the post
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments associated with the post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
