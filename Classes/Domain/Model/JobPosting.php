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

use ChristianDorka\HireMe\Traits\Properties\ApplicationProperties;
use ChristianDorka\HireMe\Traits\Properties\SalaryProperties;
use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\BenefitsProperty;
use ChristianDorka\HireMe\Traits\Property\EmploymentTypesProperty;
use ChristianDorka\HireMe\Traits\Property\HiringOrganizationsProperty;
use ChristianDorka\HireMe\Traits\Property\IncentivesProperty;
use ChristianDorka\HireMe\Traits\Property\LocationsProperty;
use ChristianDorka\HireMe\Traits\Property\PhysicalRequirementsProperty;
use ChristianDorka\HireMe\Traits\Property\ScopesProperty;
use ChristianDorka\HireMe\Traits\Property\SensoryRequirementsProperty;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use ChristianDorka\HireMe\Traits\Property\TypesProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

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

    use SlugProperty;

    protected ?string $educationRequirements = null; // EducationRequirements::class

    protected ?int $experienceRequirements = null;



    use LocationsProperty;
    use SalaryProperties;
    use ApplicationProperties;

    use HiringOrganizationsProperty;
    use BenefitsProperty;
    use TypesProperty;
    use ScopesProperty;
    use EmploymentTypesProperty;
    use IncentivesProperty;
    use PhysicalRequirementsProperty;
    use SensoryRequirementsProperty;




    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {

        // $this->categories = new ObjectStorage();
        // $this->benefits = new ObjectStorage();
    }
}
