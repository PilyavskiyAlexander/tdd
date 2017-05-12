<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_that_guests_can_not_create_the_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->make();
        $thread['_token'] = csrf_token();


        $response = $this->post(route('create_thread'), $thread->toArray());

        $response->assertStatus(302);
    }


    public function test_authenticated_user_can_create_new_threads()
    {
        $this->actingAs(factory('App\User')->create());
        $thread = factory('App\Thread')->make();
        $this->post(route('create_thread'), $thread->toArray());

        $this->get(route('all_threads'))
                ->assertSee($thread->title)
                ->assertSee($thread->body);
    }

    public function test_than_guests_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get(route('create_thread_view'))
            ->assertRedirect('login');
    }

}
