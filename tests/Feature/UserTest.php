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

    /**
     * Test that will get one user record and will return a status of 200
     *
     * @return void
     */
    public function test_get_user()
    {
        $user = User::factory()->create();
        $response = $this->get('/user/'.$user->id);
        $response->assertStatus(200);
    }

    /**
     * Test that will get a non existing user and will return a status of 404
     *
     * @return void
     */
    public function test_get_not_existing_user()
    {;
        $response = $this->get('/user/0');
        $response->assertStatus(404);
    }

    /**
     * Test that will update user's comment column and will return a status of 200
     *
     * @return void
     */
    public function test_update_user()
    {
        $user = User::factory()->create();

        $this->json('POST','/user',[
            'id' => $user->id,
            'password' => "720DF6C2482218518FA20FDC52D4DED7ECC043AB",
            'comments' => 'UserTest'
        ])->assertStatus(200);
    }

    /**
     * Test that will check requests input to validate and will return a status of 422
     *
     * @return void
     */
    public function test_update_user_invalid_input()
    {
        $user = User::factory()->create();

        $this->json('POST','/user',[
            'id' => $user->id,
            'comments' => 'UserTest'
        ])->assertStatus(422);
    }

    /**
     * Test that will execute a console command that updates the user and will return an exit code of 1
     *
     * @return void
     */
    public function test_update_user_console_command()
    {
        $user = User::factory()->create();

        $this->artisan('update:user '.$user->id.' UserTestConsole')->assertExitCode(1);
    }

     /**
     * Test that will execute a console command that checks command paramaters to be valid 
     * and will return an exit code of 0
     * @return void
     */
    public function test_update_user_console_command_fail()
    {
        $user = User::factory()->create();

        $this->artisan('update:user failParam UserTestConsole')->assertExitCode(0);
    }
}
