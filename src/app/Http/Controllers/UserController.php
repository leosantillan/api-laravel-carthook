<?php

namespace App\Http\Controllers;

use App\Events\EmptyDataRequested;
use App\Listeners\PersistData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\APIInterface;

class UserController extends Controller
{
    private $userRepository;

    private $apiInterface;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $userRepository
     * @param APIInterface $apiInterface
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository, APIInterface $apiInterface)
    {
        $this->userRepository = $userRepository;
        $this->apiInterface = $apiInterface;
    }

    /**
     * Get users
     *
     * @return ResponseFactory|Response
     */
    public function index(): Response
    {
        $users = $this->userRepository->all();

        if ($users->isEmpty()) {
            $users = $this->apiInterface->getUsers();

            event(new EmptyDataRequested($users, 'users'));
        }

        return response($users, Response::HTTP_OK);
    }

    /**
     * Get one user by id
     *
     * @param int $id
     *
     * @return ResponseFactory|Response
     */
    public function show($id): Response
    {
        $user = $this->userRepository->find($id);

        return response($user, Response::HTTP_OK);
    }

    /**
     * Get user posts
     *
     * @param int $user_id
     *
     * @return ResponseFactory|Response
     */
    public function posts($user_id): Response
    {
        $posts = $this->userRepository->posts($user_id);

        if ($posts->isEmpty()) {
            $posts = $this->apiInterface->getPosts($user_id);

            event(new EmptyDataRequested($posts, 'posts'));
        }

        return response($posts, Response::HTTP_OK);
    }
}
