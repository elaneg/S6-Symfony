<?php

namespace App\Tests\Entity;

use App\Entity\History;
use PHPUnit\Framework\TestCase;

class HistoryTest extends TestCase
{
    public function testHistoryEntity()
    {
        $history = new History();

        // Test initial values
        $this->assertNull($history->getId());
        $this->assertArrayHasKey('title', $history);
    }
}
