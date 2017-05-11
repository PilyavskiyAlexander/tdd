<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
//    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->thread = factory('App\Thread')->create();
    }

    /**
     * @return void
     */
    public function test_connection()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }

    public function test_user_can_see_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
    }

    public function test_user_can_see_single_thread()
    {
        $this->get('/threads/' . $this->thread->id)
             ->assertSee($this->thread->title);
    }

    public function test_that_user_can_read_replies_that_are_with_tread()
    {
        factory('App\Reply')->create(['thread_id' => $this->thread->id]);

        $response = $this->get(route('show_thread', $this->thread->id));

        $response->assertSee($this->thread->repliers->first()->body);
    }
}
