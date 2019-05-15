<?php

namespace Tests\Feature\Http\Controllers\Api;

use Tests\TestCase;
use App\AuthorityApi;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PackageControllerTest extends TestCase
{
    use WithoutMiddleware;


    public function testCanAuthorityGetPackages()
    {
        // $response = $this->get('/');
        $authorityApi = factory(AuthorityApi::class)->create();
        $this->actingAs($authorityApi, 'api');

        $response =  $this->getJson('api/v1/packages');
        $response->assertSuccessful()
            ->assertJsonStructure([
                'success',
                'data' => [
                    'packages' => [],
                    'count'
                ],
                'message'
            ]);
    }
}
