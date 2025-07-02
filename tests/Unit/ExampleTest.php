<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testThatTrueIsTrue(): void
    {
        $result = 2 + 2;
        $this->assertSame(4, $result);
    }
}
