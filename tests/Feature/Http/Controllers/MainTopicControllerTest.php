<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainTopicControllerTest 
// extends TestCase
{

/**
 * 
 * @   
 */
    public function can_create_a_mainTopic()
    {
        $this->actingAs($this->user);
        $data = [
            'name' => $name=$this->faker->sentence(2),
            'slug' => str_slug($name),
            'description' => $this->faker->paragraph(3),
            'filename' => UploadedFile::fake()->image('image.jpg', 1, 1),
            'order' => 1,
            'is_used' => true,
            'subTopics'=>[
                10,84
            ]

        ];
        $response = $this->post(route('mainTopics.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHas('success');
        $data = array_except($data, 'filename');
        $this->assertDatabaseHas('AS_MainTopics', $data);
    }
}
