<?php

namespace Tests\Unit;

use App\Model\Admin\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    use DatabaseTransactions;

    public function testNew(): void
    {
        $user = User::new(
            $name = 'name',
            $email = 'email'
        );

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password);

        self::assertFalse($user->isActive());
    }
}
