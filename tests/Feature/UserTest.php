<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_user()
    {
        $user = User::factory()->create();
        $response = $this->get('/user/'.$user->id);
        $response->assertStatus(200);
    }

    public function test_get_not_existing_user()
    {;
        $response = $this->get('/user/0');
        $response->assertStatus(404);
    }

    public function test_update_user()
    {
        $user = User::factory()->create();

        $this->json('POST','/user',[
            'id' => $user->id,
            'password' => "720DF6C2482218518FA20FDC52D4DED7ECC043AB",
            'comments' => 'UserTest'
        ])->assertStatus(200);
    }

    public function test_update_user_invalid_input()
    {
        $user = User::factory()->create();

        $this->json('POST','/user',[
            'id' => $user->id,
            'comments' => 'UserTest'
        ])->assertStatus(422);
    }

    public function test_update_user_console_command()
    {
        $user = User::factory()->create();

        $this->artisan('update:user '.$user->id.' UserTestConsole')->assertExitCode(1);
    }
}
