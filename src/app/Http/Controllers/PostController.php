<?php

namespace App\Http\Controllers;

use App\Events\EmptyDataRequested;
use App\Services\Interfaces\APIInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    private $apiInterface;

    /**
     * Constructor
     *
     * @param PostRepositoryInterface $postRepository
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $postRepository, APIInterface $apiInterface)
    {
        $this->postRepository = $postRepository;
        $this->apiInterface = $apiInterface;
    }

    /**
     * Get posts
     *
     * @return ResponseFactory|Response
     */
    public function index(): Response
    {
        $posts = $this->postRepository->all();

        return response($posts, Response::HTTP_OK);
    }

    /**
     * Get one post by id
     *
     * @param int $id
     *
     * @return ResponseFactory|Response
     */
    public function show($id): Response
    {
        $post = $this->postRepository->find($id);

        return response($post, Response::HTTP_OK);
    }

    /**
     * Get post comments
     *
     * @param int $post_id
     *
     * @return ResponseFactory|Response
     */
    public function comments($post_id): Response
    {
        $comments = $this->postRepository->comments($post_id);

        if ($comments->isEmpty()) {
            $comments = $this->apiInterface->getComments($post_id);

            event(new EmptyDataRequested($comments, 'comments'));
        }

        return response($comments, Response::HTTP_OK);
    }
}
