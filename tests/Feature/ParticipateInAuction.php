<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInAuction extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function an_authenticated_user_may_bid_on_projects()
    {
        $user = factory('App\User')->create();
        $this->be($user);

        $project = factory('App\Project')->create();
        
        $bid = factory('App\Bid')->create();

        $this->post('/projects/' . $project->id . '/bids', $bid->toArray());

        $this->get($project->path())
             ->assertSee($bid->price);
        
    }

}
