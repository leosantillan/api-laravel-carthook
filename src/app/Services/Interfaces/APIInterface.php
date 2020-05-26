<?php

namespace App\Services\Interfaces;

interface APIInterface
{
    public function getUsers();

    public function getPosts($user_id);

    public function getComments($post_id);
}
