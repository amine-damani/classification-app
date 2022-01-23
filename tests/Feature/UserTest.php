<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Auth;

class UserTest extends TestCase
{
    protected function authenticate()
    {
        $user = User::find(1);

        if (Auth::attempt(['email'=>$user->email, 'password' => 'password'])) {
            return $accessToken = $user->createToken('MyApp')->accessToken;
        }
        return response(['message' => 'Login credentials are invaild']);
        
    }

    public function test_create_user()
    {
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
            'Content-Type' => 'application/json'
        ])->json('POST','api/users',[
            'first_name' => 'Test',
            'last_name' => 'Test',
            'email' => 'test@admin.com',
            'phone' => '067777777',
            'age' => 30,
            'type' => 'user',
            'group_id' => 1,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_update_user()
    {
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
            'Content-Type' => 'application/json'
        ])->json('PUT','api/users/1',[
            'first_name' => 'Amine',
            'last_name' => 'Damani',
            'email' => 'damaniamine00@gmail.com',
            'type' => 'user',
            'phone' => '0688452123',
            'age' => 18
        ]);

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_find_user()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
            'Content-Type' => 'application/json'
        ])->json('GET','api/users/1');

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_get_all_users()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->json('GET','api/users');

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_delete_user()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
            'Content-Type' => 'application/json'
        ])->json('DELETE','api/users/1');

        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}
