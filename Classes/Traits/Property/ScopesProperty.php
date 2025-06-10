<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Scope;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait ScopesProperty
{
    /**
     * @var ObjectStorage<Scope>|null
     */
    protected ?ObjectStorage $scopes = null;

    /**
     * Add a scope to the storage
     *
     * @param Scope $scope
     *
     * @return void
     */
    public function addScope(Scope $scope): void
    {
        if ($this->scopes === null) {
            $this->scopes = new ObjectStorage();
        }
        $this->scopes->attach($scope);
    }

    /**
     * Remove a scope from the storage
     *
     * @param Scope $scope
     *
     * @return void
     */
    public function removeScope(Scope $scope): void
    {
        if ($this->scopes !== null) {
            $this->scopes->detach($scope);
        }
    }

    /**
     * Remove all scopes from the storage
     *
     * @return void
     */
    public function removeAllScopes(): void
    {
        $this->scopes = new ObjectStorage();
    }

    /**
     * Get all scopes
     *
     * @return ObjectStorage<Scope>|null
     */
    public function getScopes(): ?ObjectStorage
    {
        return $this->scopes;
    }

    /**
     * @param ObjectStorage<Scope>|null $scopes
     *
     * @return void
     */
    public function setScopes(?ObjectStorage $scopes): void
    {
        $this->scopes = $scopes;
    }

    /**
     * Get scopes as array
     *
     * @return array<Scope>
     */
    public function getScopesArray(): array
    {
        return $this->scopes?->toArray() ?? [];
    }
}
