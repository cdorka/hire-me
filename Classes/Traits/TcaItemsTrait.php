<?php

declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits;

/**
 * Provides methods to convert PHP Enums to TYPO3 TCA items arrays
 */
trait TcaItemsTrait
{
    /**
     * Generate TCA configuration array for TYPO3
     *
     * @param bool        $includeEmpty Whether to include an empty option at the beginning
     * @param string|null $emptyLabel   Label for the empty option (defaults to "Please select")
     *
     * @return array The TCA configuration array
     */
    public static function getTcaItems(
        bool $includeEmpty = false,
        ?string $emptyLabel = 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.pleaseSelect'
    ): array {
        $items = [];

        // Add empty option if requested
        if ($includeEmpty) {
            $items[] = [
                'label' => $emptyLabel,
                'value' => '',
            ];
        }

        // Add all enum cases
        foreach (self::cases() as $case) {
            $items[] = [
                'label' => $case->getLabel(),
                'value' => $case->value,
                'icon' => $case->getIcon() ?? null,
            ];
        }

        return $items;
    }

    /**
     * Get the label for this enum value
     *
     * @return string The label path for translation
     */
    public function getLabel(): string
    {
        // Generate the standard label path
        return sprintf(
            '%s:%s.items.%s.label',
            static::EXT_LANGUAGE_FILE_PATH,
            static::LABEL_KEY,
            $this->name
        );
    }

    /**
     * Get the icon for this enum value (optional)
     *
     * @return string|null The icon identifier or null if not defined
     */
    public function getIcon(): ?string
    {
        return defined('static::ICONS') && array_key_exists($this->name, static::ICONS)
            ? static::ICONS[$this->name]
            : null;
    }

    /**
     * Get values as associative array (value => label)
     * Useful for select options in forms
     *
     * @return array
     */
    public static function getAssociativeArray(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[$case->value] = $case->getLabel();
        }
        return $result;
    }
}
