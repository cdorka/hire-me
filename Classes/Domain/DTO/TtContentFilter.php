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
class TtContentFilter extends AbstractEntity
{
    /**
     * @var ObjectStorage<Scope>
     * @Lazy
     */
    protected ObjectStorage $txHiremeFilterScopes;

    /**
     * @var ObjectStorage<Organization>
     * @Lazy
     */
    protected ObjectStorage $txHiremeFilterHiringOrganizations;

    /**
     * @var string
     */
    protected string $txHiremeFilterEmploymentTypes = '';

    /**
     * @var string
     */
    protected string $txHiremeFilterCareerLevels = '';

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
        $this->txHiremeFilterScopes = new ObjectStorage();
        $this->txHiremeFilterHiringOrganizations = new ObjectStorage();
    }

    /**
     * Get filter scopes
     *
     * @return ObjectStorage<Scope>
     */
    public function getTxHiremeFilterScopes(): ObjectStorage
    {
        return $this->txHiremeFilterScopes;
    }

    /**
     * Get filter scopes
     *
     * @return ObjectStorage<Scope>
     */
    public function getTxHiremeFilterScopesAsArray(): array
    {
        return $this->txHiremeFilterScopes->toArray() ?? [];
    }

    /**
     * Set filter scopes
     *
     * @param ObjectStorage<Scope> $txHiremeFilterScopes
     */
    public function setTxHiremeFilterScopes(ObjectStorage $txHiremeFilterScopes): void
    {
        $this->txHiremeFilterScopes = $txHiremeFilterScopes;
    }







    /**
     * Get filter hiring organizations
     *
     * @return ObjectStorage<Organization>
     */
    public function getTxHiremeFilterHiringOrganizations(): ObjectStorage
    {
        return $this->txHiremeFilterHiringOrganizations;
    }

    /**
     * Get filter hiring organizations
     *
     * @return ObjectStorage<Organization>
     */
    public function getTxHiremeFilterHiringOrganizationsAsArray(): array
    {
        return $this->txHiremeFilterHiringOrganizations->toArray() ?? [];
    }

    /**
     * Set filter hiring organizations
     *
     * @param ObjectStorage<Organization> $txHiremeFilterHiringOrganizations
     */
    public function setTxHiremeFilterHiringOrganizations(ObjectStorage $txHiremeFilterHiringOrganizations): void
    {
        $this->txHiremeFilterHiringOrganizations = $txHiremeFilterHiringOrganizations;
    }



    /**
     * Get employment types
     */
    public function getTxHiremeFilterEmploymentTypes(): string
    {
        return $this->txHiremeFilterEmploymentTypes;
    }

    /**
     * Set employment types
     */
    public function setTxHiremeFilterEmploymentTypes(string $txHiremeFilterEmploymentTypes): void
    {
        $this->txHiremeFilterEmploymentTypes = $txHiremeFilterEmploymentTypes;
    }

    /**
     * Get career levels
     */
    public function getTxHiremeFilterCareerLevels(): string
    {
        return $this->txHiremeFilterCareerLevels;
    }

    /**
     * Set career levels
     */
    public function setTxHiremeFilterCareerLevels(string $txHiremeFilterCareerLevels): void
    {
        $this->txHiremeFilterCareerLevels = $txHiremeFilterCareerLevels;
    }
}
