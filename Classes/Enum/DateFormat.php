<?php
/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <dorka@cp-compartner.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum;


/**
 * Enum class that defines various date and time format patterns for use with IntlDateFormatter.
 * This enum provides a standardized way to format dates across the application, ensuring consistency
 * and reducing formatting errors.
 * Each case represents a specific date/time format pattern and is mapped to an integer value.
 * The patterns follow the ICU date formatting syntax used by IntlDateFormatter.
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <dorka@cp-compartner.de>
 * @license  TODO
 * @link     TODO
 * @see      https://unicode-org.github.io/icu/userguide/format_parse/datetime/
 */
enum DateFormat: int
{
    /**
     * Formats date as day.month.year (e.g., 28.05.2024)
     * Used for standard date display where time is not relevant
     */
    case FULL_DATE = 0;

    /**
     * Formats date with abbreviated weekday (e.g., Di. 28.05.2024)
     * Useful for schedule displays where the weekday adds context
     */
    case SHORT_WEEK_DAY_BEFORE_FULL_DATE = 1;

    /**
     * Formats date with two-digit year (e.g., 28.05.24)
     * Used when space is limited and the century context is clear
     */
    case SHORT_DATE = 2;

    /**
     * Formats date with hours and minutes (e.g., 28.05.2024 14:30)
     * Used for timestamp display where seconds precision isn't needed
     */
    case FULL_DATE_WITH_TIME = 3;

    /**
     * Formats date with full time including seconds (e.g., 28.05.2024 14:30:45)
     * Used for precise timestamp recording, logging, or debugging
     */
    case FULL_DATE_WITH_FULL_TIME = 4;

    /**
     * Formats date with full weekday name (e.g., Mittwoch, 28.05.2025)
     * Used for formal date presentations or when weekday emphasis is important
     */
    case FULL_WEEKDAY_WITH_DATE = 5;

    /**
     * Formats as month and year only (e.g., Mai 2024)
     * Used for broad temporal context or archive organization
     */
    case MONTH_YEAR = 6;

    /**
     * Formats as calendar week number (e.g., KW 22)
     * Used for week-based planning and German business context
     */
    case WEEK_NUMBER = 7;

    /**
     * Formats time without date (e.g., 14:30)
     * Used when only the time of day is relevant
     */
    case TIME_ONLY = 8;

    /**
     * Formats full time without date (e.g., 14:30:45)
     * Used when precise time without date context is needed
     */
    case FULL_TIME_ONLY = 9;

    /**
     * TODO 2025-03-05T14:14:00
     */
    case ISO_8601_DATETIME = 10;


    /**
     * Returns the TYPO3 TCA option for the current enum case.
     *
     * This method returns an array with the TCA label translation key, sorting index,
     * and an optional icon path (if applicable). Useful for generating TCA arrays in TYPO3.
     *
     * Example:
     * ```
     * $tcaOption = SortingOptions::CREATE_TIME->getTcaOption();
     * // Output: ['LLL:EXT:...', 0, 'EXT:uwh_template/Resources/Public/Icons/../*.svg']
     * ```
     *
     * @return array<int, int|string|null> Array containing the translation label key, sorting index, and optional icon path.
     */
    public function getTcaOption(): array
    {
        // Return the appropriate TCA option with translation label and index
        return [
            "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$this->name}.label",
            $this->value,
            '',
            null,
            [
                "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$this->name}.label",
                "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$this->name}.description"
            ]
        ];
    }

    /**
     * Generate TCA configuration array for TYPO3
     *
     * @return array The TCA configuration array
     */
    public static function getTcaItems(): array
    {
        $items = [];

        foreach (self::cases() as $case) {
            $items[] = [
                "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$case->name}.label",
                $case->value,
                '',
                null,
                [
                    "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$case->name}.label",
                    "LLL:EXT:uwh_template/Resources/Private/Language/locallang_db.xlf:enum.dateFormat.items.{$case->name}.description"
                ]
            ];
        }

        return $items;
    }

    /**
     * Returns the ICU date format pattern string corresponding to the enum case.
     * These patterns are compatible with PHP's IntlDateFormatter class and follow ICU syntax.
     * Example:
     * <code>
     * $formatter = DateFormatEnum::FullDate;
     * $pattern = $formatter->getPattern(); // Returns 'dd.MM.yyyy'
     * </code>
     *
     * @return string The ICU date format pattern
     */
    public function getPattern(): string
    {
        // Match expression maps each enum case to its corresponding ICU date format pattern
        return match ($this) {
            self::FULL_DATE => 'dd.MM.yyyy', // Full date with dots as separators
            self::SHORT_WEEK_DAY_BEFORE_FULL_DATE => 'E dd.MM.yyyy', // Short weekday (E) with full date
            self::SHORT_DATE => 'dd.MM.yy', // Short date with two-digit yearv
            self::FULL_DATE_WITH_TIME => 'dd.MM.yyyy HH:mm', // Full date with 24-hour timev
            self::FULL_DATE_WITH_FULL_TIME => 'dd.MM.yyyy HH:mm:ss', // Full date with seconds precisionv
            self::FULL_WEEKDAY_WITH_DATE => 'EEEE, dd.MM.yyyy', // Full weekday name with datev
            self::MONTH_YEAR => 'MMMM yyyy', // Month name and yearv
            self::WEEK_NUMBER => "'KW' ww", // Calendar week with literal 'KW' prefixv
            self::TIME_ONLY => 'HH:mm', // Time only in 24-hour formatv
            self::FULL_TIME_ONLY => 'HH:mm:ss', // Full time with secondsv
            self::ISO_8601_DATETIME => 'yyyy-MM-dd\'T\'HH:mm:ss', // ISO 8601 datetime formatv
        };
    }
}
