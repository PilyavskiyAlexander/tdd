<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInFormTest extends TestCase
{
    use DatabaseMigrations;

    public function test_unauthenticates_users_may_not_add_repliers()
    {
//        $this->expectException();
        // В Laravel 5.4 ошибка не появляется, а автоматически редиректит на страницу Log in, поэтому ошибки и не будет, а только 302 редирект

        $user = factory('App\User')->create();
        $thread = factory('App\Thread')->create();
        $reply = factory('App\Reply')->create(['user_id' => $user->id, 'thread_id' => $thread->id]);

        $response = $this->post(route('thread_repliers', $thread), $reply->toArray());

        $response->assertStatus(302);
    }

    public function test_authenticates_user_may_participate_in_forum_threads()
    {
       $this->be($user = factory('App\User')->create());
       $thread = factory('App\Thread')->create();
       $reply = factory('App\Reply')->create(['user_id' => $user->id, 'thread_id' => $thread->id]);

        $this->post(route('thread_repliers', $thread->id), $reply->toArray());

        $this->get(route('show_thread', $thread->id))
                ->assertSee($reply->body);
    }
}
