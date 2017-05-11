<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->reply = factory('App\Reply')->create();
    }
    public function test_it_has_user()
    {
         $this->assertInstanceOf('App\User', $this->reply->user);
    }


}
