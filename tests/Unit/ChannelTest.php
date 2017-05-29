<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    public function test_than_channel_consists_of_threads()
    {
        $channel = factory('App\Channel')->create();
        $thread = factory('App\Thread')->create(['channel_id' => $channel->id]);

        $this->assertTrue($channel->threads->contains($thread));
    }
}
