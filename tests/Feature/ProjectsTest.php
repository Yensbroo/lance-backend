<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectsTest extends TestCase
{
    
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->project = factory('App\Project')->create();
    }

    /** @test */
    public function a_user_can_browse_all_projects()
    {
        $response = $this->get('/projects');

        $response->assertSee($this->project->title);

    }

    /** @test */
    public function a_user_can_browse_a_single_project()
    {
        $response = $this->get('/projects/' . $this->project->id);
        $response->assertSee($this->project->title);
    }

    /** @test */
  /*  public function a_user_can_read_bids_that_are_associated_with_a_project()
    {
        $bid = factory('App\Bid')->create(['project_id' => $this->project->id]);

        $response = $this->get('/projects/' . $this->project->id);
        $response->assertSee($bid->price);
    }
*/
}
