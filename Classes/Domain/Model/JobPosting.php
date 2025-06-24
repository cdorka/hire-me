<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\ApplicationProperties;
use ChristianDorka\HireMe\Traits\Properties\ExperienceProperties;
use ChristianDorka\HireMe\Traits\Properties\JobPostingApplicationProperties;
use ChristianDorka\HireMe\Traits\Properties\SalaryProperties;
use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\BenefitsProperty;
use ChristianDorka\HireMe\Traits\Property\EducationRequirementsProperty;
use ChristianDorka\HireMe\Traits\Property\EmploymentTypesProperty;
use ChristianDorka\HireMe\Traits\Property\HiringOrganizationsProperty;
use ChristianDorka\HireMe\Traits\Property\IncentivesProperty;
use ChristianDorka\HireMe\Traits\Property\JourneyProperty;
use ChristianDorka\HireMe\Traits\Property\LocationsProperty;
use ChristianDorka\HireMe\Traits\Property\PhysicalRequirementsProperty;
use ChristianDorka\HireMe\Traits\Property\ScopesProperty;
use ChristianDorka\HireMe\Traits\Property\SensoryRequirementsProperty;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use ChristianDorka\HireMe\Traits\Property\TypesProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * Job posting domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class JobPosting extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;

    use SlugProperty;


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

    use EducationRequirementsProperty;

    use ExperienceProperties;

    use JobPostingApplicationProperties;

    use JourneyProperty;
    /**
     * FAQs as comma-separated reference list (group field)
     * TYPO3 will store this as: "tx_hireme_faq_123,tx_hireme_faqgroup_456"
     */
    protected string $faqs = '';

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function getFaqs(): string
    {
        return $this->faqs;
    }

    /**
     *only a setter the get is not used and should not be used because of the hamdling of multiple types of values
     */
    public function setFaqs(string $faqs): void
    {
        $this->faqs = $faqs;
    }


}
