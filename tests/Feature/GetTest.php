<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetTest extends TestCase
{
    /**
     * @group pages
     * @return void
     */
    public function testMainPageTest()
    {
        $response = $this->get(route('main'));
        $response->assertStatus(200);
    }

    /**
     * @group pages
     * @return void
     */
    public function testTaskPageTest()
    {
        $response = $this->get(route('taskShow', 13));
        $response->assertStatus(200);
    }

    /**
     * @group pages
     * @return void
     */
    public function testTaskListPageTest()
    {
        $response = $this->get(route('taskList', ['id' => 2, 'status' => 'done']));
        $response->assertStatus(200);
    }

    /**
     * @group pages
     * @return void
     */
    public function testProjectPageTest()
    {
        $response = $this->get(route('projectShow'));
        $response->assertStatus(200);
    }
}
