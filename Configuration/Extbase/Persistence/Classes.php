<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Domain\DTO\TtContentFilter;
use ChristianDorka\HireMe\Domain\DTO\TtContentPagination;
use ChristianDorka\HireMe\Domain\DTO\TtContentSource;
use ChristianDorka\HireMe\Domain\Model\Benefit;
use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use ChristianDorka\HireMe\Domain\Model\Department;
use ChristianDorka\HireMe\Domain\Model\Faq;
use ChristianDorka\HireMe\Domain\Model\FaqGroup;
use ChristianDorka\HireMe\Domain\Model\Incentive;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Model\Journey;
use ChristianDorka\HireMe\Domain\Model\Location;
use ChristianDorka\HireMe\Domain\Model\Milestone;
use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Domain\Model\PhysicalRequirement;
use ChristianDorka\HireMe\Domain\Model\Scope;
use ChristianDorka\HireMe\Domain\Model\SensoryRequirement;
use ChristianDorka\HireMe\Domain\Model\SpecialRequirement;
use ChristianDorka\HireMe\Domain\Model\Type;
use ChristianDorka\HireMe\Domain\Model\Url;

/** @noinspection SpellCheckingInspection */
return [
    // Domain model persistence mapping
    Benefit::class => [
        "tableName" => "tx_hireme_benefit",
    ],
    Category::class => [
        "tableName" => "tx_hireme_category",
    ],
    Country::class => [
        "tableName" => "tx_hireme_country",
    ],
    Department::class => [
        "tableName" => "tx_hireme_department",
    ],
    Faq::class => [
        "tableName" => "tx_hireme_faq",
    ],
    FaqGroup::class => [
        "tableName" => "tx_hireme_faqgroup",
    ],
    Incentive::class => [
        "tableName" => "tx_hireme_incentive",
    ],
    JobPosting::class => [
        "tableName" => "tx_hireme_jobposting",
    ],
    Journey::class => [
        "tableName" => "tx_hireme_journey",
    ],
    Location::class => [
        "tableName" => "tx_hireme_location",
    ],
    Milestone::class => [
        "tableName" => "tx_hireme_milestone",
    ],
    Organization::class => [
        "tableName" => "tx_hireme_organization",
    ],
    PhysicalRequirement::class => [
        "tableName" => "tx_hireme_physicalrequirement",
    ],
    Scope::class => [
        "tableName" => "tx_hireme_scope",
    ],
    SensoryRequirement::class => [
        "tableName" => "tx_hireme_sensoryrequirement",
    ],
    SpecialRequirement::class => [
        "tableName" => "tx_hireme_specialrequirement",
    ],
    Type::class => [
        "tableName" => "tx_hireme_type",
    ],
    Url::class => [
        "tableName" => "tx_hireme_url",
    ],

    // Tt_content DTO persistence mapping
    TtContentFilter::class => [
        "tableName" => "tt_content",
    ],
    TtContentPagination::class => [
        "tableName" => "tt_content",
    ],
    TtContentSource::class => [
        "tableName" => "tt_content",
    ],
];
