<?php

namespace App\Repositories;

use App\Post;
use App\Comment;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Get posts.
     *
     * @return Post[]|Collection
     */
    public function all()
    {
        return Post::all();
    }

    /**
     * Get one post.
     *
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        return Post::find($id);
    }

    /**
     * Get post's comments.
     *
     * @param int $post_id
     * @return mixed
     */
    public function comments($post_id)
    {
        return Comment::where('post_id', $post_id)->get();
    }
}
