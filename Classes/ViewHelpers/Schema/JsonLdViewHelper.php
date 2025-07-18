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

namespace ChristianDorka\HireMe\ViewHelpers\Schema;

use ChristianDorka\HireMe\Service\JsonLdService;
use RuntimeException;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * ViewHelper to render JSON-LD structured data
 *
 * Usage in Fluid:
 * <code>
 * <hire:jsonLd object="{jobPosting}" type="JobPosting" />
 * </code>
 *
 * @author       Christian Dorka <mail@christiandorka.de>
 * @license      GPL-3.0-or-later
 * @noinspection PhpUnused
 */
class JsonLdViewHelper extends AbstractViewHelper
{
    /**
     * @var bool
     */
    protected $escapeOutput = false;

    public function __construct(protected JsonLdService $jsonLdService)
    {
    }

    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('object', 'object', 'The domain model object', true);
        $this->registerArgument('type', 'string', 'Schema.org type (e.g., JobPosting, Event)', true);
    }

    /**
     * Render JSON-LD script tag
     */
    public function render(): string
    {
        // Step 1: Initialize variables to avoid potential undefined array key values
        $object = $this->arguments['object'] ?? null;
        $type = $this->arguments['type'] ?? null;

        // Step 2: Guard clause: Runtime exception if not all required arguments have values
        if ($object === null || $type === null) {
            throw new RuntimeException('Not all required arguments are provided (object or type)', 1752650581);
        }

        // Step 3: Call general method that determines which jsonLd structure needs to be build and calls them via JsonLdService
        $jsonLdData = $this->jsonLdService->buildJsonLdData($object, $type);

        // Step 4: Guard clause: When no match found or otherwise the return is empty return empty string
        if ($jsonLdData === []) {
            return '';
        }

        // Step 5: Generate a json object from the php dictionary
        $jsonLd = json_encode($jsonLdData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Step 4: Guard clause: Return empty string if the json_encode failed
        if ($jsonLd === false) {
            return '';
        }

        // Step 5: Add the generated jsonLd to the page head
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addHeaderData(
            '<script type="application/ld+json">' . $jsonLd . '</script>'
        );

        // Step 6: Return empty string because the content is generated and added to the PageRender
        return '';
    }
}
