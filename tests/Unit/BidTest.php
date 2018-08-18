<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BidTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    function it_has_an_owner()
    {
        $bid = factory('App\Bid')->create();

        $this->assertInstanceOf('App\User', $bid->owner);
    }
}
