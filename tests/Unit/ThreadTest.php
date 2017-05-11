<?php

namespace Tests\Unit;

use Tests\TestCase;
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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_has_repliers()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->repliers);
    }

    public function test_a_thread_has_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->user);
    }

    public function test_a_thread_can_add_a_reply()
    {
        $this->thread->addReply(
            [
                'body' => 'Test',
                'user_id' => 1,
            ]
        );

        $this->assertCount(1, $this->thread->repliers);
    }
}
