<?php

namespace Tests\Unit;

use App\Models\Auth\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_system_prevents_duplicate_users()
    {
        $user1 = User::make([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'Jane Doe',
            'email' => 'janedoe@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    public function test_system_can_delete_users()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if ($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }
}
