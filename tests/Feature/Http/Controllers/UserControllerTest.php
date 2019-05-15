<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{

    /**
     * 
     *
     * @test
     */
    public function can_create_new_user()
    {
        $this->actingAs($this->user);
        $data = [
            'role' => 'Developer',
            'firstName' => $this->faker->firstname,
            'lastName' => $this->faker->lastname,
            'email' => $this->faker->unique()->safeEmail,
            // 'password'=>Hash::make('secret'),

        ];
        // dump(User::all());
        // dump($this->user);
        $response = $this->post(route('users.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('AS_Authority_Manager_Accounts', $data);
    }


    /**
     * 
     *
     * @test
     */
    public function can_create_update_user()
    {
        $this->actingAs($this->user);
        $user = factory(User::class)->create();
        $data = [
            'role' => 'Developer',
            'firstName' => $this->faker->firstname,
            'lastName' => $this->faker->lastname,
            'email' => $this->faker->unique()->safeEmail,
            // 'password'=>Hash::make('secret'),

        ];
        $response = $this->put(route('users.update', 1), $data);
        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('AS_Authority_Manager_Accounts', ['firstName' => $data['firstName']]);
    }

    /**
     * 
     *
     * @test
     */
    public function can_delete_a_user()
    {
        $this->actingAs($this->user);
        $user = factory(User::class)->create();
        $response = $this->delete(route('users.destroy', $user->id));
        $response->assertStatus(302)->assertSessionHas('success');
    }

    
}
