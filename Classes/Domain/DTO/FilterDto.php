<?php

declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Scope;
use ChristianDorka\HireMe\Domain\Model\Type;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
class FilterDto
{
    public function __construct(
        /** @var ObjectStorage<Type>|null */
        protected ?ObjectStorage $types = null,
        /** @var ObjectStorage<Scope>|null */
        protected ?ObjectStorage $scopes = null,
        /** @var array<int>|null */
        protected ?array $careerLevels = null,
    ) {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->types = $this->types ?? new ObjectStorage();
        $this->scopes = $this->scopes ?? new ObjectStorage();
    }

    public function getTypes(): ObjectStorage
    {
        return $this->types ?? new ObjectStorage();
    }

    public function setTypes(?ObjectStorage $types): void
    {
        $this->types = $types;
    }

    public function getScopes(): ObjectStorage
    {
        return $this->types ?? new ObjectStorage();
    }

    public function setScopes(?ObjectStorage $scopes): void
    {
        $this->scopes = $scopes;
    }

    public function getCareerLevels(): ?array
    {
        return $this->careerLevels;
    }

    public function setCareerLevels(?array $careerLevels): void
    {
        $this->careerLevels = $careerLevels;
    }



}
