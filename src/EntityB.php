<?php

declare(strict_types=1);

namespace App;

/**
 * EntityB: a simple class with no multi-line attributes
 */
class EntityB
{
    private ?string $id = null;
    private string $title = '';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
