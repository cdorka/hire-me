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

use ChristianDorka\HireMe\Domain\DTO\TtContentPagination;
use TYPO3\CMS\Core\Pagination\ArrayPaginator;
use TYPO3\CMS\Core\Pagination\SlidingWindowPagination;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class PaginationService
{
    /**
     * Generate pagination with detailed configuration and metadata
     *
     * @param array                    $items       Items to paginate
     * @param int                      $currentPage Current page number
     * @param TtContentPagination|null $config      Pagination configuration
     *
     * @return array{
     *     config: TtContentPagination,
     *     items: array,
     *     currentPage: int,
     *     totalPages: int,
     *     totalItems: int,
     *     itemsPerPage: int|null,
     *     hasPages: bool,
     *     hasPreviousPage: bool,
     *     hasNextPage: bool,
     *     isFirstPage: bool,
     *     isLastPage: bool,
     *     previousPage: int|null,
     *     nextPage: int|null,
     *     startItem: int,
     *     endItem: int,
     *     dots: array,
     *     hasHiddenDotsBefore: bool,
     *     hasHiddenDotsAfter: bool,
     *     enabled: bool
     * }
     */
    public function generateFromConfig(
        array $items,
        int $currentPage = 1,
        TtContentPagination $config = null,
    ): array {
        // Ensure that a config is present if not generate one with default property values
        if ($config === null) {
            $config = GeneralUtility::makeInstance(TtContentPagination::class);
        }

        // Prevent page numbers below 1 which would break the pagination
        $currentPage = max(1, $currentPage);

        // Count the number of items to calculate how many pages are needed
        $totalItems = count($items);

        // Get the number of items per page from the config, if not configured set it to the number of total items
        $itemsPerPage = $config->getItemsPerPage() ?? $totalItems;

        // Handle case where itemsPerPage is null (show all items)
        if ($itemsPerPage === null || $itemsPerPage < 1) {
            // If no limit is set, show all items on one page
            // Use 1 as minimum to prevent division by zero errors
            $itemsPerPage = $totalItems > 0 ? $totalItems : 1;
        }

        // Create a typo3 paginator object
        $paginator = new ArrayPaginator(
            $items,
            $currentPage,
            $itemsPerPage,
        );

        // Calculate pagination metadata
        $totalPages = $paginator->getNumberOfPages();
        $hasPages = $totalPages > 1; // Does pagination make sense? (more than one page)
        $hasPreviousPage = $currentPage > 1;
        $hasNextPage = $currentPage < $totalPages;
        $isFirstPage = $currentPage === 1;
        $isLastPage = $currentPage === $totalPages;

        // Calculate previous and next page numbers
        $previousPage = $hasPreviousPage ? $currentPage - 1 : null;
        $nextPage = $hasNextPage ? $currentPage + 1 : null;

        // Calculate which items are shown on current page
        // This creates "Showing 1-10 of 50 items" type displays
        if ($totalItems > 0) {
            // Calculate the first item number on this page
            // Page 1: items 1-10, Page 2: items 11-20, etc.
            $startItem = (($currentPage - 1) * $itemsPerPage) + 1;
        } else {
            // No items to show
            $startItem = 0;
        }
        // Calculate the last item number on this page
        // Use min() to handle last page which might have fewer items
        $endItem = min($currentPage * $itemsPerPage, $totalItems);

        // Handle edge case where user requested invalid page
        if ($currentPage > $totalPages && $totalPages > 0) {
            // User requested page 10 but only 5 pages exist
            // Redirect them to the last valid page
            $currentPage = $totalPages;

            // Recreate paginator with corrected page number
            $paginator = new ArrayPaginator(
                $items,
                $currentPage,
                $itemsPerPage,
            );

            // Recalculate item range for corrected page
            $startItem = (($currentPage - 1) * $itemsPerPage) + 1;
            $endItem = min($currentPage * $itemsPerPage, $totalItems);

            // Recalculate navigation state after page correction
            $hasPreviousPage = $currentPage > 1;
            $hasNextPage = $currentPage < $totalPages;
            $isFirstPage = $currentPage === 1;
            $isLastPage = $currentPage === $totalPages;
            $previousPage = $hasPreviousPage ? $currentPage - 1 : null;
            $nextPage = $hasNextPage ? $currentPage + 1 : null;
        }

        // Create the sliding window pagination display
        // This creates the "1 2 3 ... 8 9 10" style page links
        $maxLinks = $config->getMaxLinks();

        // Validate maxLinks to prevent display issues
        if ($maxLinks !== null && $maxLinks < 1) {
            // At least show 1 page link
            $maxLinks = 1;
        }

        // create the sliding window pagination
        $pagination = new SlidingWindowPagination(
            $paginator,
            $maxLinks ?? 0, // fallback to 0 to display all otherwise an error is generateds
        );

        // Generate page numbers array for sliding window display ("dots")
        // This creates the array of page numbers to show: [1, 2, 3, 4, 5] or [8, 9, 10, 11, 12]
        $dots = [];
        if ($totalPages > 0 && $maxLinks > 0) {
            // Calculate the range of pages to show around current page
            $halfRange = (int) floor($maxLinks / 2);

            // Determine start and end of the page range
            $startPage = max(1, $currentPage - $halfRange);
            $endPage = min($totalPages, $currentPage + $halfRange);

            // Adjust range if we're at the beginning or end to always show maxLinks pages
            if ($endPage - $startPage + 1 < $maxLinks) {
                if ($startPage === 1) {
                    // We're at the beginning, extend to the right
                    $endPage = min($totalPages, $startPage + $maxLinks - 1);
                } else {
                    // We're at the end, extend to the left
                    $startPage = max(1, $endPage - $maxLinks + 1);
                }
            }

            // Generate the array of page numbers
            $dots = range($startPage, $endPage);
        }

        // Check if there are hidden pages before and after the visible range
        $hasHiddenDotsBefore = count($dots) > 0 && $dots[0] > 1;
        $hasHiddenDotsAfter = count($dots) > 0 && end($dots) < $totalPages;

        // Check if pagination should be enabled based on config and actual need
        $enabled = $config->getEnabled() && $hasPages;

        return [
            // Core objects
            'config' => $config,      // Configuration settings
            'items' => $pagination->getPaginator()->getPaginatedItems(),  // The paginated items for this page

            // Page information
            'currentPage' => $currentPage,      // Which page we're showing
            'totalPages' => $totalPages,        // How many pages total
            'totalItems' => $totalItems,        // Total number of items
            'itemsPerPage' => $itemsPerPage,    // Items shown per page

            // Navigation state
            'hasPages' => $hasPages,            // Should we show pagination at all?
            'hasNoPreviousPage' => !$hasPreviousPage, // Show "Previous" button?
            'hasNoNextPage' => !$hasNextPage,      // Show "Next" button?
            'isFirstPage' => $isFirstPage,      // Are we on the first page?
            'isLastPage' => $isLastPage,        // Are we on the last page?
            'previousPage' => $previousPage,    // Previous page number (null if no previous page)
            'nextPage' => $nextPage,            // Next page number (null if no next page)

            // Item display information
            'startItem' => $startItem,          // First item number on this page
            'endItem' => $endItem,              // Last item number on this page

            // Page numbers for sliding window display
            'dots' => $dots,                    // Array of page numbers to display [1,2,3,4,5]
            'hasHiddenDotsBefore' => $hasHiddenDotsBefore, // Show "..." before page numbers?
            'hasHiddenDotsAfter' => $hasHiddenDotsAfter,   // Show "..." after page numbers?

            // Master control
            'enabled' => $enabled, // Should pagination be shown?
        ];
    }
}
