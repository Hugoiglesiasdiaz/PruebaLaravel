<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_see_all_projects()
    {
        $this->withoutExceptionHandling();

        $project = Project::create([
            'title' => 'Proyecto 1',
            'url' => 'proyecto-1',
            'description' => 'Descripción del proyecto 1'
        ]);

        $project2 = Project::create([
            'title' => 'Proyecto 3',
            'url' => 'proyecto-2',
            'description' => 'Descripción del proyecto 2'
        ]);

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);

        $response->assertViewIs('projects.index');

        $response->assertViewHas('projects');

        $response->assertSee($project->title);
        $response->assertSee($project2->title);
    }

    public function test_can_see_individual_projects(){
        $project = Project::create([
            'title' => 'Proyecto 1',
            'url' => 'proyecto-1',
            'description' => 'Descripción del proyecto 1'
        ]);

        $project2 = Project::create([
            'title' => 'Proyecto 3',
            'url' => 'proyecto-2',
            'description' => 'Descripción del proyecto 2'
        ]);

        $response = $this->get(route('projects.show', $project));
        $response->assertSee($project->title);
        $response->assertDontSee($project2->title);

    }
}
