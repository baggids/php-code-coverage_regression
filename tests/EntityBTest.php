<?php

declare(strict_types=1);

namespace App\Tests;

use App\EntityB;
use PHPUnit\Framework\TestCase;

/**
 * Test that covers EntityB only — simulates ParaTest Worker 2.
 */
class EntityBTest extends TestCase
{
    public function testSetAndGetTitle(): void
    {
        $entity = new EntityB();
        $result = $entity->setTitle('Test Title');

        $this->assertSame($entity, $result);
        $this->assertSame('Test Title', $entity->getTitle());
    }

    public function testGetIdReturnsNullByDefault(): void
    {
        $this->assertNull((new EntityB())->getId());
    }
}
