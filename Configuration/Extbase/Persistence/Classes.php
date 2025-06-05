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

use ChristianDorka\HireMe\Domain\Model\Benefit;
use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use ChristianDorka\HireMe\Domain\Model\Department;
use ChristianDorka\HireMe\Domain\Model\Location;
use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Domain\Model\Scope;
use ChristianDorka\HireMe\Domain\Model\Url;
use ChristianDorka\HireMe\Domain\Model\Type;

return [
    Category::class => [
        'tableName' => 'tx_hireme_domain_model_category',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
            'description'  => ['fieldName' => 'description'],
            'icon'  => ['fieldName' => 'icon'],
            'jobPostings'  => ['fieldName' => 'job_postings'],
            'parent'  => ['fieldName' => 'parent'],
        ]
    ],
    Url::class => [
        'tableName' => 'tx_hireme_domain_model_url',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'link'  => ['fieldName' => 'link'],
            'linkType'  => ['fieldName' => 'link_type'],
        ]
    ],
    Organization::class => [
        'tableName' => 'tx_hireme_domain_model_organization',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
            'legalName'  => ['fieldName' => 'legal_name'],
            'homepage'  => ['fieldName' => 'homepage'],
            'urls'  => ['fieldName' => 'urls'],
            'detailPage'  => ['fieldName' => 'detail_page'],
            'logo'  => ['fieldName' => 'logo'],
        ]
    ],
    Location::class => [
        'tableName' => 'tx_hireme_domain_model_location',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'streetName'  => ['fieldName' => 'street_name'],
            'postalCode'  => ['fieldName' => 'postal_code'],
            'city'  => ['fieldName' => 'city'],
            'region'  => ['fieldName' => 'region'],
            'country'  => ['fieldName' => 'country'],
            'jobPostings'  => ['fieldName' => 'job_postings'],
        ]
    ],
    \ChristianDorka\HireMe\Domain\Model\Incentive::class => [
        'tableName' => 'tx_hireme_domain_model_incentive',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            // ...
        ]
    ],
    Country::class => [
        'tableName' => 'tx_hireme_domain_model_country',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
            'twoLetterIsoCode'  => ['fieldName' => 'two_letter_iso_code'],
            'threeLetterIsoCode'  => ['fieldName' => 'three_letter_iso_code'],
        ]
    ],
    Scope::class => [
        'tableName' => 'tx_hireme_domain_model_scope',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
        ]
    ],
    Department::class => [
        'tableName' => 'tx_hireme_domain_model_department',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
        ]
    ],
    // Type::class => [
    //     'tableName' => 'tx_hireme_domain_model_type',
    //     'properties' => [
    //         'crdate'  => ['fieldName' => 'crdate'],
    //         'tstamp'  => ['fieldName' => 'tstamp'],
    //         'sorting'  => ['fieldName' => 'sorting'],
    //         'uid'  => ['fieldName' => 'uid'],
    //         'title'  => ['fieldName' => 'title'],
    //         'slug'  => ['fieldName' => 'slug'],
    //         'icon'  => ['fieldName' => 'icon'],
    //     ]
    // ],
    Benefit::class => [
        'tableName' => 'tx_hireme_domain_model_benefit',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'slug'  => ['fieldName' => 'slug'],
            'description'  => ['fieldName' => 'description'],
            'icon'  => ['fieldName' => 'icon'],
            'jobPostings'  => ['fieldName' => 'job_postings'],
        ]
    ],
];
