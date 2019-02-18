<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->visit('/')
        // ->see('ばばん');

        $response = $this->get('/');
        $response->assertSee('ばばん');
        $response->assertStatus(200);
    }
}
