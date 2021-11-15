<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // Route smoke tests
    public function testRootRouteSmokeTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLoginRouteSmokeTest()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testMenuRouteSmokeTest()
    {
        $response = $this->get('/menu');
        $response->assertStatus(200);
    }

    public function testSettingsRouteSmokeTest()
    {
        $response = $this->get('/settings');
        $response->assertStatus(200);
    }

    public function testNonExistentRoutesSmokeTest()
    {
        $response = $this->get('/non-existent-route');
        $response->assertStatus(404);
    }

    public function testAppRouteSmokeTest()
    {
        $response = $this->get('/app/pos');
        $response->assertStatus(200);
    }

    public function testAppRouteWithNonExistentRouteSmokeTest()
    {
        $response = $this->get('/app/non-existent-route');
        $response->assertStatus(404);
    }

}
