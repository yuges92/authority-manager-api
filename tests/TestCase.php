<?php
namespace Tests;

use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    protected static $migrated = false;
    use CreatesApplication;
    // use DatabaseTransactions;
    // use WithoutMiddleware; 
    use WithFaker;

    protected  function setUp(): void
    {
        parent::setUp();
        if (!static::$migrated) {
            Artisan::call('migrate:refresh');
            Artisan::call('passport:client --name=<client-name> --no-interaction --personal');
            static::$migrated = true;
            factory(User::class)->create();
        }
        $this->user = User::find(1);

        // Storage::fake('public');
        // $this->artisan('migrate:refresh');
        // echo'111 \n';
        // $this->artisan('db:seed');
        // $this->withoutExceptionHandling();
    }

    protected function tearDown():void
    {
        parent::tearDown();
        // Artisan::call('migrate:refresh');

    }
    



}
