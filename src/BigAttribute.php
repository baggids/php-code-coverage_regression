<?php

declare(strict_types=1);

namespace App;

/**
 * Stand-in for API-Platform attributes
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class BigAttribute
{
    public function __construct(
        public readonly array $operations = [],
    ) {
    }
}
