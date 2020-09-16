<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic test example.
     *
     * @group dd
     * @return void
     */
    public function testMainPageTest()
    {
        $response = $this->get(route('main'));
        $response->assertStatus(200);
    }
}
