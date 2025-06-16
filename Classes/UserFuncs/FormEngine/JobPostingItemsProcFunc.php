<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\UserFuncs\FormEngine;

use ChristianDorka\HireMe\Enum\Job\ApplicationType;
use ChristianDorka\HireMe\Enum\Job\CareerLevel;
use ChristianDorka\HireMe\Enum\Job\EducationRequirements;
use ChristianDorka\HireMe\Enum\Job\EmploymentType;
use ChristianDorka\HireMe\Enum\Job\ExperienceRequirementsType;
use ChristianDorka\HireMe\Enum\Job\JobLocationType;
use ChristianDorka\HireMe\Enum\Salary\SalaryCurrency;
use ChristianDorka\HireMe\Enum\Salary\SalaryType;
use ChristianDorka\HireMe\Enum\Salary\SalaryUnit;
use ChristianDorka\HireMe\Registry\ApplicationFormRegistry;

/**
 * ItemsProcFunc for url type items
 */
class JobPostingItemsProcFunc
{
    public function salaryUnitItemsProcFunc(array &$params) : void {
        $params['items'] = SalaryUnit::getTcaItems();
    }
    public function salaryCurrencyItemsProcFunc(array &$params) : void {
        $params['items'] = SalaryCurrency::getTcaItems();
    }
    public function salaryTypeItemsProcFunc(array &$params) : void {
        $params['items'] = SalaryType::getTcaItems();
    }
    public function jobLocationTypeItemsProcFunc(array &$params) : void {
        $params['items'] = JobLocationType::getTcaItems();
    }
    public function employmentTypeItemsProcFunc(array &$params) : void {
        $params['items'] = EmploymentType::getTcaItems();
    }
    public function educationRequirementsItemsProcFunc(array &$params) : void {
        $params['items'] = EducationRequirements::getTcaItems();
    }
    public function experienceRequirementsTypeItemsProcFunc(array &$params) : void {
        $params['items'] = ExperienceRequirementsType::getTcaItems();
    }
    public function careerLevelsItemsProcFunc(array &$params) : void {
        $params['items'] = CareerLevel::getTcaItems();
    }


    public function applicationTypeItemsProcFunc(array &$params) : void {
        $params['items'] = ApplicationType::getTcaItems();
    }

    /**
     * Get all registered application forms for TCA select field
     */
    public function applicationFormsItemsProcFunc(array &$params) : void {
        $registry = ApplicationFormRegistry::getInstance();
        $params['items'] = $registry->getTcaItems();
    }
}
