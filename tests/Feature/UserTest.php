<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Create user test.
     */
    public function test_create_user(): void
    {
        $userData = $this->generateUserData();
        $response = $this->post('/users', $userData);
        $user = $this->getUserByData($userData);

        $this->assertModelExists($user);
        $response->assertRedirect('/users/' . $user->id);
    }

    /**
     * Update user test.
     */
    public function test_update_user(): void
    {
        // creating source user
        $userData = $this->generateUserData();
        $this->post('/users', $userData);
        $user = $this->getUserByData($userData);

        // updating user
        $newUserData = $this->generateUserData();
        $response = $this->put('/users/' . $user->id, $newUserData);
        $editedUser = $this->getUserByData($newUserData);

        $this->assertEquals($editedUser->id, $user->id);
        $this->assertEquals($editedUser->name, $newUserData['name']);
        $response->assertRedirect('/users/' . $user->id);
    }

    /**
     * Delete user test.
     */
    public function test_delete_user(): void
    {
        // creating source user
        $userData = $this->generateUserData();
        $this->post('/users', $userData);
        $user = $this->getUserByData($userData);

        // deleting user
        $response = $this->delete('/users/' . $user->id);

        $this->assertModelMissing($user);
        $response->assertRedirect('/users');
    }

    private function generateUserData(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
        ];
    }

    private function getUserByData(array $userData): Model
    {
        return User::query()
            ->where('email', $userData['email'])
            ->where('name', $userData['name'])
            ->first();
    }
}
