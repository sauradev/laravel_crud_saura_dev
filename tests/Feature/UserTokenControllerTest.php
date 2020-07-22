<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTokenControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_validate_user()
    {
        $user = factory(User::class)->create();
        $data = [
            'email' => $user->email,
            'password' => $user->password,
            'device_name' => 'test'
        ];
        $response = $this->postJson('api/sanctum/token', $data);
        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
    }
}
