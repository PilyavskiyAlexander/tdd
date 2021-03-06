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
        $this->expectException('Illuminate\Auth\AuthenticationException');
        // Оказывается, этот трабл приходит в зборке с Laravel
        // Нужно отключить отлавливания исключений
        // Решения - https://gist.github.com/adamwathan/125847c7e3f16b88fa33a9f8b42333da

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

        $this->get(route('show_thread', ['channel' => $thread->channel->name, 'thread' => $thread->id]))
                ->assertSee($reply->body);
    }

    public function test_that_reply_requires_a_body()
    {
        $this->withExceptionHandling()->actingAs($user = factory('App\User')->create());

        $thread = factory('App\Thread')->create();
        $reply = factory('App\Reply')->make(['user_id' => $user->id, 'thread_id' => $thread->id, 'body' => null]);

        $this->post(route('thread_repliers', $thread->id), $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
