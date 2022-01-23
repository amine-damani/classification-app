<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;
use Auth;

class GroupTest extends TestCase
{
    public function test_get_all_groups()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->json('GET','api/groups');
        
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_find_group()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->json('GET','api/groups/1');

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}
