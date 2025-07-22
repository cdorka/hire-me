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
        'properties' => [
            'categoryEnabled' => [ 'fieldName' => 'tx_hireme_filter_category_enabled' ],
            'categoryType' => [ 'fieldName' => 'tx_hireme_filter_category_type' ],
            'categoryItems' => [ 'fieldName' => 'tx_hireme_filter_category_items' ],
            'categoryStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_category_starting_points' ],
            'categoryIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_category_include_starting_points' ],
            'categoryDepth' => [ 'fieldName' => 'tx_hireme_filter_category_depth' ],
            'sysCategoryEnabled' => [ 'fieldName' => 'tx_hireme_filter_syscategory_enabled' ],
            'sysCategoryType' => [ 'fieldName' => 'tx_hireme_filter_syscategory_type' ],
            'sysCategoryItems' => [ 'fieldName' => 'tx_hireme_filter_syscategory_items' ],
            'sysCategoryStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_syscategory_starting_points' ],
            'sysCategoryIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_syscategory_include_starting_points' ],
            'sysCategoryDepth' => [ 'fieldName' => 'tx_hireme_filter_syscategory_depth' ],
            'locationEnabled' => [ 'fieldName' => 'tx_hireme_filter_location_enabled' ],
            'locationType' => [ 'fieldName' => 'tx_hireme_filter_location_type' ],
            'locationItems' => [ 'fieldName' => 'tx_hireme_filter_location_items' ],
            'locationStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_location_starting_points' ],
            'locationIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_location_include_starting_points' ],
            'locationDepth' => [ 'fieldName' => 'tx_hireme_filter_location_depth' ],
            'countryEnabled' => [ 'fieldName' => 'tx_hireme_filter_country_enabled' ],
            'countryType' => [ 'fieldName' => 'tx_hireme_filter_country_type' ],
            'countryItems' => [ 'fieldName' => 'tx_hireme_filter_country_items' ],
            'countryStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_country_starting_points' ],
            'countryIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_country_include_starting_points' ],
            'countryDepth' => [ 'fieldName' => 'tx_hireme_filter_country_depth' ],
            'departmentEnabled' => [ 'fieldName' => 'tx_hireme_filter_department_enabled' ],
            'departmentType' => [ 'fieldName' => 'tx_hireme_filter_department_type' ],
            'departmentItems' => [ 'fieldName' => 'tx_hireme_filter_department_items' ],
            'departmentStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_department_starting_points' ],
            'departmentIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_department_include_starting_points' ],
            'departmentDepth' => [ 'fieldName' => 'tx_hireme_filter_department_depth' ],
            'organizationEnabled' => [ 'fieldName' => 'tx_hireme_filter_organization_enabled' ],
            'organizationType' => [ 'fieldName' => 'tx_hireme_filter_organization_type' ],
            'organizationItems' => [ 'fieldName' => 'tx_hireme_filter_organization_items' ],
            'organizationStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_organization_starting_points' ],
            'organizationIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_organization_include_starting_points' ],
            'organizationDepth' => [ 'fieldName' => 'tx_hireme_filter_organization_depth' ],

            'typeEnabled' => [ 'fieldName' => 'tx_hireme_filter_type_enabled' ],
            'typeType' => [ 'fieldName' => 'tx_hireme_filter_type_type' ],
            'typeItems' => [ 'fieldName' => 'tx_hireme_filter_type_items' ],
            'typeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_type_starting_points' ],
            'typeIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_type_include_starting_points' ],
            'typeDepth' => [ 'fieldName' => 'tx_hireme_filter_type_depth' ],

            'scopeEnabled' => [ 'fieldName' => 'tx_hireme_filter_scope_enabled' ],
            'scopeType' => [ 'fieldName' => 'tx_hireme_filter_scope_type' ],
            'scopeItems' => [ 'fieldName' => 'tx_hireme_filter_scope_items' ],
            'scopeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_scope_starting_points' ],
            'scopeIncludeStartingPoints' => [ 'fieldName' => 'tx_hireme_filter_scope_include_starting_points' ],
            'scopeDepth' => [ 'fieldName' => 'tx_hireme_filter_scope_depth' ],



            'employmentTypesEnabled' => [ 'fieldName' => 'tx_hireme_filter_employment_types_enabled' ],
            'employmentTypesItems' => [ 'fieldName' => 'tx_hireme_filter_employment_types_items' ],

            'careerLevelsEnabled' => [ 'fieldName' => 'tx_hireme_filter_career_levels_enabled' ],
            'careerLevelsItems' => [ 'fieldName' => 'tx_hireme_filter_career_levels_items' ],
        ]
    ],
    TtContentPagination::class => [
        "tableName" => "tt_content",
        'properties' => [
            'enabled' => [ 'fieldName' => 'tx_hireme_pagination_enabled' ],
            'positionTop' => [ 'fieldName' => 'tx_hireme_pagination_position_top' ],
            'positionBottom' => [ 'fieldName' => 'tx_hireme_pagination_position_bottom' ],
            'showDots' => [ 'fieldName' => 'tx_hireme_pagination_show_dots' ],
            'maxLinks' => [ 'fieldName' => 'tx_hireme_pagination_max_links' ],
            'itemsPerPage' => [ 'fieldName' => 'tx_hireme_pagination_items_per_page' ],
            'showPrevNext' => [ 'fieldName' => 'tx_hireme_pagination_show_prev_next' ],
            'showFirstLast' => [ 'fieldName' => 'tx_hireme_pagination_show_first_last' ],
        ],
    ],
    TtContentSource::class => [
        "tableName" => "tt_content",
        'properties' => [
            'limit' => [ 'fieldName' => 'tx_hireme_source_limit' ],
            'startingPoints' => [ 'fieldName' => 'tx_hireme_source_starting_points' ],
            'includeStartingPoints' => [ 'fieldName' => 'tx_hireme_source_include_starting_points' ],
            'depth' => [ 'fieldName' => 'tx_hireme_source_depth' ],

            'categoryItems' => [ 'fieldName' => 'tx_hireme_source_category_items' ],
            'categoryCondition' => [ 'fieldName' => 'tx_hireme_source_category_condition' ],

            'sysCategoryItems' => [ 'fieldName' => 'tx_hireme_source_syscategory_items' ],
            'sysCategoryCondition' => [ 'fieldName' => 'tx_hireme_source_syscategory_condition' ],

            'locationItems' => [ 'fieldName' => 'tx_hireme_source_location_items' ],
            'locationCondition' => [ 'fieldName' => 'tx_hireme_source_location_condition' ],

            'countryItems' => [ 'fieldName' => 'tx_hireme_source_country_items' ],
            'countryCondition' => [ 'fieldName' => 'tx_hireme_source_country_condition' ],

            'departmentItems' => [ 'fieldName' => 'tx_hireme_source_department_items' ],
            'departmentCondition' => [ 'fieldName' => 'tx_hireme_source_department_condition' ],

            'organizationItems' => [ 'fieldName' => 'tx_hireme_source_organization_items' ],
            'organizationCondition' => [ 'fieldName' => 'tx_hireme_source_organization_condition' ],
        ],
    ],
];
