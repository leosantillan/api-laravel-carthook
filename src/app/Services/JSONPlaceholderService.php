<?php

namespace App\Services;

use App\Services\Interfaces\APIInterface;
use Illuminate\Support\Facades\Http;

class JSONPlaceholderService implements APIInterface
{
    const URL = 'https://jsonplaceholder.typicode.com';

    /**
     * Get Users
     *
     * @return array
     */
    public function getUsers(): array
    {
        $response = Http::get(self::URL . '/users');

        return $response->json();
    }

    /**
     * Get Posts by UserId
     *
     * @param int $user_id
     * @return array
     */
    public function getPosts($user_id = 0): array
    {
        $response = Http::withOptions([
            'query' => [
                'userId' => $user_id
            ],
        ])->get(self::URL . '/posts');

        return $response->json();
    }

    /**
     * Get Comments by PostId
     *
     * @param int $post_id
     * @return array
     */
    public function getComments($post_id = 0): array
    {
        $response = Http::withOptions([
            'query' => [
                'postId' => $post_id
            ],
        ])->get(self::URL . '/comments');

        return $response->json();
    }
}
