<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        
      // Arrange

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
    }
}
