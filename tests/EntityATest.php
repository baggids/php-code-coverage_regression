<?php

declare(strict_types=1);

namespace App\Tests;

use App\EntityA;
use App\EntityB;
use PHPUnit\Framework\TestCase;

/**
 * Test that covers EntityA only — simulates ParaTest Worker 1.
 */
class EntityATest extends TestCase
{
    public function testSetAndGetName(): void
    {
        $entity = new EntityA();
        $result = $entity->setName('Test Name');

        $this->assertSame($entity, $result);
        $this->assertSame('Test Name', $entity->getName());
    }

    public function testSetAndGetDescription(): void
    {
        $entity = new EntityA();
        $result = $entity->setDescription('A description');

        $this->assertSame($entity, $result);
        $this->assertSame('A description', $entity->getDescription());
    }

    public function testGetIdReturnsNullByDefault(): void
    {
        $this->assertNull((new EntityA())->getId());
    }

    public function testGetDescriptionReturnsNullByDefault(): void
    {
        $this->assertNull((new EntityA())->getDescription());
    }
}
