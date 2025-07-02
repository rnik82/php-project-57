<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testStringLength(): void
    {
        $string = 'Hello!';
        $this->assertSame(6, strlen($string));
    }
}
