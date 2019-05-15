<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\AuthorityApi;

class AuthControllerTest extends TestCase
{

    // use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function can_an_authority_login()
    {
        $url = '/api/login';
        $authorityApi = factory(AuthorityApi::class)->create();
        $data = [
            'username' => $authorityApi->username,
            'password' => 'password'
        ];
        $response = $this->postJson($url, $data);
        $response->assertSuccessful()
            ->assertJsonStructure([
                'success',
                'data' => [
                    'access_token',
                    'expires_at',
                ],
                'message',

            ]);
    }
    
}
