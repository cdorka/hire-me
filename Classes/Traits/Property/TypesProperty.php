<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Type;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait TypesProperty
{
    /**
     * @var ObjectStorage<Type>|null
     */
    protected ?ObjectStorage $types = null;

    /**
     * Add a type to the storage
     *
     * @param Type $type
     *
     * @return void
     */
    public function addType(Type $type): void
    {
        if ($this->types === null) {
            $this->types = new ObjectStorage();
        }
        $this->types->attach($type);
    }

    /**
     * Remove a type from the storage
     *
     * @param Type $type
     *
     * @return void
     */
    public function removeType(Type $type): void
    {
        if ($this->types !== null) {
            $this->types->detach($type);
        }
    }

    /**
     * Remove all types from the storage
     *
     * @return void
     */
    public function removeAllTypes(): void
    {
        $this->types = new ObjectStorage();
    }

    /**
     * Get all types
     *
     * @return ObjectStorage<Type>|null
     */
    public function getTypes(): ?ObjectStorage
    {
        return $this->types;
    }

    /**
     * @param ObjectStorage<Type>|null $types
     *
     * @return void
     */
    public function setTypes(?ObjectStorage $types): void
    {
        $this->types = $types;
    }

    /**
     * Get types as array
     *
     * @return array<Type>
     */
    public function getTypesArray(): array
    {
        return $this->types?->toArray() ?? [];
    }
}
