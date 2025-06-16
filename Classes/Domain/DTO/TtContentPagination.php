<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Domain\Model\Scope;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

/**
 * Content Element Model for tt_content
 */
class TtContentPagination extends AbstractEntity
{
    /**
     * @var ObjectStorage<Scope>
     * @Lazy
     */
    protected ObjectStorage $txHiremePaginationScopes;

    /**
     * @var ObjectStorage<Organization>
     * @Lazy
     */
    protected ObjectStorage $txHiremePaginationHiringOrganizations;

    /**
     * @var string
     */
    protected string $txHiremePaginationEmploymentTypes = '';

    /**
     * @var string
     */
    protected string $txHiremePaginationCareerLevels = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initializeObject();
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->txHiremePaginationScopes = new ObjectStorage();
        $this->txHiremePaginationHiringOrganizations = new ObjectStorage();
    }

    /**
     * Get filter scopes
     *
     * @return ObjectStorage<Scope>
     */
    public function getTxHiremePaginationScopes(): ObjectStorage
    {
        return $this->txHiremePaginationScopes;
    }

    /**
     * Get filter scopes
     *
     * @return ObjectStorage<Scope>
     */
    public function getTxHiremePaginationScopesAsArray(): array
    {
        return $this->txHiremePaginationScopes->toArray() ?? [];
    }

    /**
     * Set filter scopes
     *
     * @param ObjectStorage<Scope> $txHiremePaginationScopes
     */
    public function setTxHiremePaginationScopes(ObjectStorage $txHiremePaginationScopes): void
    {
        $this->txHiremePaginationScopes = $txHiremePaginationScopes;
    }







    /**
     * Get filter hiring organizations
     *
     * @return ObjectStorage<Organization>
     */
    public function getTxHiremePaginationHiringOrganizations(): ObjectStorage
    {
        return $this->txHiremePaginationHiringOrganizations;
    }

    /**
     * Get filter hiring organizations
     *
     * @return ObjectStorage<Organization>
     */
    public function getTxHiremePaginationHiringOrganizationsAsArray(): array
    {
        return $this->txHiremePaginationHiringOrganizations->toArray() ?? [];
    }

    /**
     * Set filter hiring organizations
     *
     * @param ObjectStorage<Organization> $txHiremePaginationHiringOrganizations
     */
    public function setTxHiremePaginationHiringOrganizations(ObjectStorage $txHiremePaginationHiringOrganizations): void
    {
        $this->txHiremePaginationHiringOrganizations = $txHiremePaginationHiringOrganizations;
    }



    /**
     * Get employment types
     */
    public function getTxHiremePaginationEmploymentTypes(): string
    {
        return $this->txHiremePaginationEmploymentTypes;
    }

    /**
     * Set employment types
     */
    public function setTxHiremePaginationEmploymentTypes(string $txHiremePaginationEmploymentTypes): void
    {
        $this->txHiremePaginationEmploymentTypes = $txHiremePaginationEmploymentTypes;
    }

    /**
     * Get career levels
     */
    public function getTxHiremePaginationCareerLevels(): string
    {
        return $this->txHiremePaginationCareerLevels;
    }

    /**
     * Set career levels
     */
    public function setTxHiremePaginationCareerLevels(string $txHiremePaginationCareerLevels): void
    {
        $this->txHiremePaginationCareerLevels = $txHiremePaginationCareerLevels;
    }
}
