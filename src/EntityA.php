<?php

declare(strict_types=1);

namespace App;

/**
 * EntityA: a class decorated with a multi-line attribute.
 */
#[BigAttribute(operations: [
    'get_item' => [
        'method' => 'GET',
        'path' => '/entity_a/{id}',
        'security' => 'is_granted("ROLE_USER")',
        'normalization_context' => ['groups' => ['entity_a:read']],
        'denormalization_context' => ['groups' => ['entity_a:write']],
        'openapi_context' => [
            'summary' => 'Retrieve an EntityA resource',
            'description' => 'Returns a single EntityA identified by its UUID.',
        ],
    ],
    'put_item' => [
        'method' => 'PUT',
        'path' => '/entity_a/{id}',
        'security' => 'is_granted("ROLE_ADMIN") or object.getOwner() == user',
        'normalization_context' => ['groups' => ['entity_a:read']],
        'denormalization_context' => ['groups' => ['entity_a:write']],
        'openapi_context' => [
            'summary' => 'Replace an EntityA resource',
            'description' => 'Full replacement of an existing EntityA.',
        ],
    ],
    'delete_item' => [
        'method' => 'DELETE',
        'path' => '/entity_a/{id}',
        'security' => 'is_granted("ROLE_ADMIN")',
        'openapi_context' => [
            'summary' => 'Delete an EntityA resource',
        ],
    ],
    'post_collection' => [
        'method' => 'POST',
        'path' => '/entity_a',
        'security' => 'is_granted("ROLE_USER")',
        'normalization_context' => ['groups' => ['entity_a:read']],
        'denormalization_context' => ['groups' => ['entity_a:write']],
        'openapi_context' => [
            'summary' => 'Create an EntityA resource',
            'description' => 'Creates a new EntityA resource.',
        ],
    ],
    'get_collection' => [
        'method' => 'GET',
        'path' => '/entity_a',
        'normalization_context' => ['groups' => ['entity_a:read']],
        'openapi_context' => [
            'summary' => 'List EntityA resources',
            'description' => 'Retrieves the collection of EntityA resources.',
        ],
    ],
])]
class EntityA
{
    private ?string $id = null;
    private string $name = '';
    private ?string $description = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
