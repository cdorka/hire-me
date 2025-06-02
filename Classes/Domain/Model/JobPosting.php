<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Domain\Trait\ApplicationProperties;
use ChristianDorka\HireMe\Domain\Trait\CategoriesProperties;
use ChristianDorka\HireMe\Domain\Trait\LocationsProperty;
use ChristianDorka\HireMe\Domain\Trait\SalaryProperties;
use ChristianDorka\HireMe\Domain\Trait\SlugProperty;
use ChristianDorka\HireMe\Domain\Trait\SystemProperties;
use ChristianDorka\HireMe\Domain\Trait\TitleProperty;
use ChristianDorka\HireMe\Enum\Job\EducationRequirements;
use ChristianDorka\HireMe\Enum\Job\JobLocationType;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
class JobPosting extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;

    protected ?Type $type = null;
    protected ?Scope $scope = null;

    use SlugProperty;

    protected ?Organization $hiringOrganizations = null;
    protected ?string $jobId = null;
    protected ?string $employmentType = null; // EmploymentType::class
    protected ?string $teaser = null;
    protected ?string $intro = null;
    protected ?string $eligibilityToWorkRequirement = null;
    protected ?string $responsibilities = null;
    protected ?string $qualifications = null;
    protected ?string $skills = null;
    protected ?string $workingHours = null;
    protected ?string $educationRequirementsText = null;
    protected ?string $educationRequirements = null; // EducationRequirements::class
    protected ?string $experienceRequirementsText = null;
    protected ?string $incentives = null; // Collection?!
    /** @var ObjectStorage<Benefit>|null */
    protected ?ObjectStorage $benefits = null; //
    protected ?string $physicalRequirements = null; // Collection?!
    protected ?string $sensoryRequirement = null; // Collection?!
    protected ?int $experienceRequirements = null;

    protected ?string $jobLocationType = null; // JobLocationType::

    use LocationsProperty;
    use SalaryProperties;
    use ApplicationProperties;





    use CategoriesProperties;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {

        $this->categories = new ObjectStorage();
        $this->benefits = new ObjectStorage();
    }
}
