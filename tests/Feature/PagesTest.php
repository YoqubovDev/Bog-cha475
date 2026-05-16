<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * Test if the home page loads successfully.
     */
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Sevinch');
    }

    /**
     * Test if the teachers page loads successfully.
     */
    public function test_teachers_page_is_accessible(): void
    {
        $response = $this->get('/teachers');

        $response->assertStatus(200);
        $response->assertSee('Bizning Tarbiyachilar');
    }
}
