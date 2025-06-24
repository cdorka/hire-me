<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Registry;

use InvalidArgumentException;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class ApplicationTypeRegistry implements SingletonInterface
{
    /**
     * @var array<int, array{label: string}>
     */
    protected array $items = [];

    /**
     * @var array<int> List of disabled items
     */
    protected array $disabledItems = [];

    /**
     * Register a new application form
     *
     * @param integer $identifier Unique identifier for the item
     * @param string  $label Human-readable label for the form
     */
    public function registerItem(int $identifier, string $label): void
    {
        if (key_exists($identifier, $this->items)) {
            throw new InvalidArgumentException("Index of ". $identifier ." does already exist in ApplicationTypeRegistry");
        }

        $this->items[$identifier] = [
            'label' => $label,
        ];
    }

    /**
     *
     * @param int $identifier
     *
     * @return array{label: string}|null
     */
    public function getItem(int $identifier): ?array
    {
        if (isset($this->disabledItems[$identifier])) {
            return null;
        }

        return $this->items[$identifier] ?? null;
    }

/**
 * Get all active itmes (registered and not disabled)
 *
 * @return array<int, array{label: string}>
 * @noinspection PhpUnused
 */
    public function getActiveForms(): array
    {
        $activeItems = [];

        foreach ($this->items as $key => $value) {
            if (key_exists($key, $this->disabledItems)) {
                continue;
            }
            $activeItems[$key] = $value;
        }

        return $activeItems;
    }

    /**
     * @return array<int, array{label: string}>
     *
     * @noinspection PhpUnused
     */
    public function getAllItems(): array
    {
        return $this->items;
    }

    /**
     * @return array<int, array{label: string}>
     *
     * @noinspection PhpUnused
     */
    public function getDisabledItems(): array
    {
        return $this->disabledItems;
    }


    /**
     * Get forms in TCA items format for select fields (only active forms)
     *
     * @return array<int, array{value: int, label: string}>
     * @noinspection PhpUnused
     */
    public function getTcaItems(): array
    {
        $items = [];

        foreach ($this->items as $identifier => $form) {
            // Skip disabled forms
            if (isset($this->disabledItems[$identifier])) {
                continue;
            }

            $items[] = [
                "value" => $identifier,
                "label" => $form['label'],
            ];
        }

        // Sort by label for better UX
        usort($items, function($a, $b) {
            return strcmp($a[0], $b[0]);
        });

        return $items;
    }

    /**
     * Get registry instance
     */
    public static function getInstance(): self
    {
        return GeneralUtility::makeInstance(self::class);
    }
}
