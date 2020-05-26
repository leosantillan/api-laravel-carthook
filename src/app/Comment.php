<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'name', 'email', 'body'
    ];

    /**
     * Get the associated post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
