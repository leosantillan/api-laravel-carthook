<?php

namespace App\Repositories;

use App\User;
use App\Post;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get users.
     *
     * @return User[]|Collection
     */
    public function all()
    {
        return User::all();

        // ******************
        // For full data use:
        //
        // return User::with(['posts', 'posts.comments'])->get();
        // ******************************************************
    }

    /**
     * Get one user.
     *
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * Get user's posts.
     *
     * @param int $user_id
     * @return mixed
     */
    public function posts($user_id)
    {
        return Post::where('user_id', $user_id)->get();
    }
}
