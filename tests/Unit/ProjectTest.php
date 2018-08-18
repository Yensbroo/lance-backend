<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    function a_project_has_bids() 
    {
        $project = factory('App\Project')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $project->bids);
    }

    /** @test */
    function a_project_can_make_a_string_path()
    {
        $project = factory('App\Project')->create();
        
        $this->assertEquals("/projects/{$project->category->slug}/{$project->id}", $project->path());
    }

    /** @test */
    function a_project_has_a_creator()
    {
        $project = factory('App\Project')->create();

        $this->assertInstanceOf('App\User', $project->creator);
    }

    /** @test */
    function a_project_belongs_to_a_category()
    {
        $project = factory('App\Project')->create();

        $this->assertInstanceOf('App\Category', $project->category);
    }
} 
