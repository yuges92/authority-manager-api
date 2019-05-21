<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainTopicControllerTest
 extends TestCase
{
    /**
     * @
     *
     * @return void
     */
    public function example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
