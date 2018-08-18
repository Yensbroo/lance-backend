<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class createProjectsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_authenticated_user_can_create_new_projects()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $project = factory('App\Project')->make();
        $this->post('/projects', $project->toArray());

        $this->get($project->path())
             ->assertSee($project->title)
             ->assertSee($project->body);
    }
}
