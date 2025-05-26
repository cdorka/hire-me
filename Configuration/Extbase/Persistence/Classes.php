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

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use ChristianDorka\HireMe\Domain\Model\Location;
use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Domain\Model\Url;

return [
    Category::class => [
        'tableName' => 'tx_hireme_category',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'description'  => ['fieldName' => 'description'],
            'icon'  => ['fieldName' => 'icon'],
            'jobPostings'  => ['fieldName' => 'job_postings'],
            'parent'  => ['fieldName' => 'parent'],
        ]
    ],
    Url::class => [
        'tableName' => 'tx_hireme_url',
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
        'tableName' => 'tx_hireme_url',
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
        'tableName' => 'tx_hireme_location',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'street'  => ['fieldName' => 'street'],
            'postalCode'  => ['fieldName' => 'postal_code'],
            'city'  => ['fieldName' => 'city'],
            'region'  => ['fieldName' => 'region'],
            'country'  => ['fieldName' => 'country'],
            'jobPostings'  => ['fieldName' => 'job_postings'],
        ]
    ],
    Country::class => [
        'tableName' => 'tx_hireme_country',
        'properties' => [
            'crdate'  => ['fieldName' => 'crdate'],
            'tstamp'  => ['fieldName' => 'tstamp'],
            'sorting'  => ['fieldName' => 'sorting'],
            'uid'  => ['fieldName' => 'uid'],
            'title'  => ['fieldName' => 'title'],
            'twoLetterIsoCode'  => ['fieldName' => 'two_letter_iso_code'],
            'threeLetterIsoCode'  => ['fieldName' => 'three_letter_iso_code'],
        ]
    ],
];
