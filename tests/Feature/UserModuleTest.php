<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserModuleTest extends TestCase
{
    /** @test */

    function it_load_page_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    function it_load_page_post_form()
    {
        $response = $this->get('pre-inscripciones');

        $response->assertStatus(200);
    }
}
