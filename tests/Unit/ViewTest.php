<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // Test the following views exist: dashboard, login, register, error, menu, settings, pos
    public function testDashboardViewExits()
    {
        $this->assertFileExists(base_path('resources/views/dashboard.blade.php'));
    }

    public function testLoginViewExits()
    {
        $this->assertFileExists(base_path('resources/views/login.blade.php'));
    }

    public function testRegisterViewExits()
    {
        $this->assertFileExists(base_path('resources/views/register.blade.php'));
    }

    public function testErrorViewExits()
    {
        $this->assertFileExists(base_path('resources/views/error.blade.php'));
    }

    public function testMenuViewExits()
    {
        $this->assertFileExists(base_path('resources/views/menu.blade.php'));
    }

    public function testSettingsViewExits()
    {
        $this->assertFileExists(base_path('resources/views/settings.blade.php'));
    }

    public function testPosViewExits()
    {
        $this->assertFileExists(base_path('resources/views/pos.blade.php'));
    }
}
