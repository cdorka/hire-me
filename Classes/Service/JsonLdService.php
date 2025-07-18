<?php

/*
 * This file is part of the TYPO3 CMS extension "hire_me".
 *
 * Copyright (C) 2025-2025 Christian Dorka <mail@christiandorka.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Service;

use ChristianDorka\HireMe\Domain\Model\Faq;
use ChristianDorka\HireMe\Domain\Model\Location;
use ChristianDorka\HireMe\Domain\Model\Organization;
use RuntimeException;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Service to build JSON-LD structured data
 *
 * @author       Christian Dorka <mail@christiandorka.de>
 * @license      GPL-3.0-or-later
 */
class JsonLdService
{
    public const TYPE_JOBPOSTING = 'JobPosting';
    public const TYPE_FAQ = 'FAQPage';
    public const TYPE_ORGANIZATION = 'Organization';
    public const TYPE_LOCATION = 'Place';


    /**
     * Build JSON-LD data based on object type
     *
     * @param object|array<object> $object
     * @param string $type
     *
     * @return array<string, mixed>
     */
    public function buildJsonLdData(object|array $object, string $type): array
    {
        return match ($type) {
            self::TYPE_JOBPOSTING => $this->buildJobPostingSchema($object),
            self::TYPE_FAQ => $this->buildFaqJsonSchema($object),
            self::TYPE_ORGANIZATION => $this->buildOrganizationSchema($object),
            self::TYPE_LOCATION => $this->buildLocationSchema($object),
            default => []
        };
    }

    /**
     * Build JobPosting JSON-LD data
     *
     * @param object $jobPosting
     *
     * @return array<string, mixed>
     */
    public function buildJobPostingSchema(object $jobPosting): array
    {
        // Step 1: Check if method parameter has the correct type
        if (!$jobPosting instanceof JobPosting) {
            throw new RuntimeException('Expected JobPosting instance, got ' . get_class($jobPosting), 1752650579);
        }

        // Step 2: Initialize variables
        /** @var array<string, mixed> $data */
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'JobPosting',
            'title' => $jobPosting->getTitle(),
            // 'description' => strip_tags($jobPosting->getDescription() ?? ''),
            'datePosted' => $jobPosting->getStarttime()?->format('Y-m-d'),
            'validThrough' => $jobPosting->getValidThrough()?->format('Y-m-d'),
            // 'employmentType' => $this->mapEmploymentType($jobPosting->getEmploymentType() ?? ''),

        ];

        foreach ($jobPosting->getLocations() as $location) {
            $data['jobLocation'][] = $this->buildJsonLdData($location, self::TYPE_LOCATION);
        }



        DebuggerUtility::var_dump($jobPosting->getHideHiringOrganization() === false);
        DebuggerUtility::var_dump($jobPosting->hasOnlyOneHiringOrganization());

        // Step 3: Only add the hiring organization if it is enabled to display the company and check if it has only one record, because multiple are nopt allowed, if so return the same value as when it would be hidden
        if ($jobPosting->getHideHiringOrganization() === false && $jobPosting->hasOnlyOneHiringOrganization()) {
            $data['hiringOrganization'] = $this->buildJsonLdData($jobPosting->getFirstHiringOrganization(), self::TYPE_ORGANIZATION);
        } else {
            $data['hiringOrganization'] = [
                "@type" => "Organization",
                "name" => "confidential",
            ];
        }


        // Add salary information if available
     //   if ($jobPosting->getSalaryMin() || $jobPosting->getSalaryMax()) {
     //       $data['baseSalary'] = [
     //           '@type' => 'MonetaryAmount',
     //           'currency' => $jobPosting->getSalaryCurrency() ?? 'EUR',
     //           'value' => [
     //               '@type' => 'QuantitativeValue',
     //               'minValue' => $jobPosting->getSalaryMin(),
     //               'maxValue' => $jobPosting->getSalaryMax(),
     //               'unitText' => 'YEAR'
     //           ]
     //       ];
     //   }

        // Step 3: Return data
        return $data;
    }

    /**
     * Build FAQ JSON-LD data
     *
     * @param array<Faq> $faqs Array of FAQ objects
     *
     * @return array<string, mixed>
     */
    public function buildFaqJsonSchema(array $faqs): array
    {
        // Step 1: Guard clause: Early return if array is empty
        if ($faqs === []) {
            return [];
        }

        // Step 2: Validate that all items in the array are Faq objects
        foreach ($faqs as $faq) {
            if (!$faq instanceof Faq) {
                throw new RuntimeException('Expected array of Faq instances, got ' . get_class($faq), 1752650580);
            }
        }

        // Step 3: Initialize variables
        /** @var array<string, mixed> $data */
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => []
        ];

        // Step 4: Build FAQ data
        foreach ($faqs as $faq) {
            $answer = $faq->getTitle();
            $question = $faq->getDescription();

            if ($answer !== null && $question !== null) {
                $data['mainEntity'][] = [
                    '@type' => 'Question',
                    'name' => $question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => strip_tags($answer)
                    ]
                ];
            }
        }

        // Step 5: Return data
        return $data;
    }



    private function processTypo3Url(?string $url = null): ?string {
        if ($url === null) {
            return null;
        }

        $cObj = GeneralUtility::makeInstance(ContentObjectRenderer::class);

        // Generate URL directly
        return $cObj->typoLink_URL([
            'parameter' => $url
        ]);
    }

    /**
     * Build Organization schema data
     *
     * @param object $organization
     *
     * @return array<string, mixed>
     */
    public function buildOrganizationSchema(object $organization): array
    {
        if (!$organization instanceof Organization) {
            throw new RuntimeException('Expected Organization instance, got ' . get_class($organization), 1752650583);
        }


        /** @var array<string, mixed> $data */
        $data = [
            '@type' => 'Organization',
            'name' => $organization->getTitle() ?? '',
            'legalName' => $organization->getLegalName() ?? '',
            'url' => $this->processTypo3Url($organization->getHomepage()),
        ];

        // Add logo
        if (($logo = $organization->getLogo()) instanceof FileReference) {
            $data['logo'] = [
                '@type' => 'ImageObject',
                'url' => $logo->getOriginalResource()->getPublicUrl(),
                'caption' => $logo->getOriginalResource()->getAlternative() ?: $organization->getTitle(),
            ];
        }

        // Add additional URLs (social media, etc.)
        $urls = $organization->getUrls();
        $sameAs = [];
        foreach ($urls as $url) {
            if ($link = $url->getLink()) {
                if ($link = $this->processTypo3Url($link)) {
                    $sameAs[] = $link;
                }

            }
        }
        if (!empty($sameAs)) {
            $data['sameAs'] = $sameAs;
        }

        // Add identifier using slug
        $slug = $organization->getSlug();
        if ($slug) {
            $data['identifier'] = $slug;
        }

        return $data;
    }


    /**
     * Build Location schema data
     *
     * @param object $location
     *
     * @return array<string, mixed>
     */
    public function buildLocationSchema(object $location): array
    {
        // Step 1: Guard clause: return runtime exception if object has the wrong type to object mapping
        if (!$location instanceof Location) {
            throw new RuntimeException('Expected Location instance, got ' . get_class($location), 1752650584);
        }

        // Step 2: Initialize base Place schema
        /** @var array<string, mixed> $data */
        $data = [
            '@type' => 'Place'
        ];

        // Step 3: Add name/title if available
        $title = $location->getTitle();
        if ($title) {
            $data['name'] = $title;
        }

        // Step 4: Build postal address
        $address = [];

        // Build street address from street name and house number
        $streetName = $location->getStreetName();
        $houseNumber = $location->getHouseNumber();
        if ($streetName || $houseNumber) {
            $streetAddress = trim(($streetName ?? '') . ' ' . ($houseNumber ?? ''));
            if ($streetAddress) {
                $address['streetAddress'] = $streetAddress;
            }
        }

        // Add city
        $city = $location->getCity();
        if ($city) {
            $address['addressLocality'] = $city;
        }

        // Add postal code
        $postalCode = $location->getPostalCode();
        if ($postalCode) {
            $address['postalCode'] = $postalCode;
        }

        // Add region/state
        $region = $location->getRegion();
        if ($region) {
            $address['addressRegion'] = $region;
        }

        // Add country
        $country = $location->getCountry();
        if ($country) {
            // Assuming getCountry() returns a Country object with getName() method
            // Adjust based on your actual Country model implementation
            $countryName = $country->getTitle();
            if ($countryName) {
                $address['addressCountry'] = $countryName;
            }
        }

        // Step 5: Add address to data if any address fields are present
        if (!empty($address)) {
            $data['address'] = array_merge(['@type' => 'PostalAddress'], $address);
        }

        // Step 6: Add geographical coordinates if available
        $latitude = $location->getTitle();
        $longitude = $location->getLongitude();
        if ($latitude && $longitude) {
            $data['geo'] = [
                '@type' => 'GeoCoordinates',
                'latitude' => (float) $latitude,
                'longitude' => (float) $longitude
            ];
        }

        // Step 7: Return schema data
        return $data;
    }


}
