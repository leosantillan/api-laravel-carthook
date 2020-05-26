<?php

namespace App\Listeners;

use App\Events\EmptyDataRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PersistData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmptyDataRequested  $event
     * @return void
     */
    public function handle(EmptyDataRequested $event): void
    {
        switch ($event->type) {
            case 'users':
                array_walk($event->data, function (&$v) {
                    unset($v['id'], $v['address'], $v['company']);
                });
                \App\User::insert($event->data);
                break;
            case 'posts':
                array_walk($event->data, function (&$v) {
                    $v['user_id'] = $v['userId'];
                    unset($v['id'], $v['userId']);
                });
                \App\Post::insert($event->data);
                break;
            case 'comments':
                array_walk($event->data, function (&$v) {
                    $v['post_id'] = $v['postId'];
                    unset($v['id'], $v['postId']);
                });
                \App\Comment::insert($event->data);
                break;
        }
    }
}
