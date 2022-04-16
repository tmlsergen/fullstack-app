<?php

namespace Tests\Unit;

use App\Models\Comment;
use Faker\Factory;
use Tests\TestCase;

class CommentTest extends TestCase
{

    /**
     * Testing Store Endpoint
     */
    public function test_can_create_comment(): void
    {
        $data = [
            'parent_id' => null,
            'layer' => 0,
            'user_name' => $this->faker->name,
            'comment' => $this->faker->text,
        ];

        $assertJson = [
            'message' => "success",
            'data' => $data
        ];

        $assertJson['data']['parent_id'] = 0;
        $assertJson['data']['id'] = 1;

        $this->post(route('comment.store'), $data)
            ->assertStatus(200)
            ->assertJson($assertJson);
    }

}
