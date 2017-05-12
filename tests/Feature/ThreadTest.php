<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    public function test_show_one_thread()
    {
        $response = $this->get(route('show_thread', ['channel' => $this->thread->channel->name, 'thread' => $this->thread->id]));

        $response->assertStatus(200);
    }

    public function test_show_all_threads()
    {
        $response = $this->get(route('all_threads'));

        $response->assertStatus(200);
    }
}
