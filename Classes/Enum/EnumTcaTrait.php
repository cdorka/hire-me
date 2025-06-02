<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Trait for handling common enum functionality for TYPO3 TCA configuration
 */
trait EnumTcaTrait
{
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
                'label' => $case->getLabel(),
                'value' => $case->value,
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
        return sprintf('%s:%s.items.%s.label',
            static::EXT_LANGUAGE_FILE_PATH,
            static::LABEL_KEY,
            $this->name
        );
    }
}
