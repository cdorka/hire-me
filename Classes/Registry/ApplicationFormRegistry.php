<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Registry;

use InvalidArgumentException;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Singleton form registry for job posting application forms.
 * Allows registration and temporary disabling of application forms.
 * Multiple extensions can manipulate the disabled list.
 */
class ApplicationFormRegistry implements SingletonInterface
{
    /**
     * @var array<string, array{path: string, label: string}>
     */
    protected array $registeredForms = [];

    /**
     * @var array<string, true> List of identifiers that are disabled
     */
    protected array $disabledIdentifiers = [];

    /**
     * Register a new application form
     *
     * @param string $identifier Unique identifier for the form
     * @param string $path Path to the form file (e.g., 'EXT:hire_me/Resources/Private/Forms/ApplicationForm.form.yaml')
     * @param string $label Human-readable label for the form
     * @throws \InvalidArgumentException If the form file does not exist
     */
    public function registerForm(string $identifier, string $path, string $label): void
    {
        $absolutePath = GeneralUtility::getFileAbsFileName($path);
        if (!file_exists($absolutePath)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Application form file "%s" (resolved to "%s") does not exist for identifier "%s"',
                    $path,
                    $absolutePath,
                    $identifier
                )
            );
        }

        $this->registeredForms[$identifier] = [
            'path' => $path,
            'label' => $label,
        ];
    }

    /**
     * Permanently remove a form from registry
     *
     * @noinspection PhpUnused
     **/
    public function removeForm(string $identifier): void
    {
        unset($this->registeredForms[$identifier]);
        unset($this->disabledIdentifiers[$identifier]);
    }

    /**
     * Temporarily disable a form (keeps it registered but hides from selection)
     *
     * @noinspection PhpUnused
     */
    public function disableForm(string $identifier): void
    {
        $this->disabledIdentifiers[$identifier] = true;
    }

    /**
     * Re-enable a previously disabled form
     *
     * @noinspection PhpUnused
     */
    public function enableForm(string $identifier): void
    {
        unset($this->disabledIdentifiers[$identifier]);
    }

    /**
     * Re-enable all disabled forms
     *
     * @noinspection PhpUnused
     */
    public function enableAllForms(): void
    {
        $this->disabledIdentifiers = [];
    }

    /**
     * Check if a form exists and is enabled (available for use)
     *
     * @noinspection PhpUnused
     */
    public function hasActiveForm(string $identifier): bool
    {
        return isset($this->registeredForms[$identifier]) && !isset($this->disabledIdentifiers[$identifier]);
    }

    /**
     * Check if a form exists in registry (regardless of enabled/disabled status)
     *
     * @noinspection PhpUnused
     */
    public function hasForm(string $identifier): bool
    {
        return isset($this->registeredForms[$identifier]);
    }

    /**
     * Check if a form is temporarily disabled
     *
     * @noinspection PhpUnused
     */
    public function isFormDisabled(string $identifier): bool
    {
        return isset($this->disabledIdentifiers[$identifier]);
    }

    /**
     * Get a specific active form by identifier (returns null if disabled or not found)
     *
     * @param string $identifier
     *
     * @return array{path: string, label: string}|null
     * @noinspection PhpUnused
     */
    public function getActiveForm(string $identifier): ?array
    {
        if (isset($this->disabledIdentifiers[$identifier])) {
            return null;
        }

        return $this->registeredForms[$identifier] ?? null;
    }

    /**
     * Get a specific form by identifier (ignoring disabled status)
     *
     * @param string $identifier
     *
     * @return array{path: string, label: string}|null
     * @noinspection PhpUnused
     */
    public function getForm(string $identifier): ?array
    {
        return $this->registeredForms[$identifier] ?? null;
    }

    /**
     * Get all active forms (registered and not disabled)
     *
     * @return array<string, array{path: string, label: string}>
     * @noinspection PhpUnused
     */
    public function getActiveForms(): array
    {
        $activeForms = [];

        /** @noinspection PhpLoopCanBeConvertedToArrayFilterInspection */
        foreach ($this->registeredForms as $identifier => $form) {
            if (!isset($this->disabledIdentifiers[$identifier])) {
                $activeForms[$identifier] = $form;
            }
        }

        return $activeForms;
    }

    /**
     * Get all registered forms (including disabled ones)
     *
     * @return array<string, array{path: string, label: string}>
     * @noinspection PhpUnused
     */
    public function getAllForms(): array
    {
        return $this->registeredForms;
    }

    /**
     * Get all disabled form identifiers
     *
     * @return array<string>
     * @noinspection PhpUnused
     */
    public function getDisabledFormIdentifiers(): array
    {
        return array_keys($this->disabledIdentifiers);
    }

    /**
     * Get the path for a specific active form identifier (returns null if disabled)
     *
     * @noinspection PhpUnused
     */
    public function getActiveFormPath(string $identifier): ?string
    {
        if (isset($this->disabledIdentifiers[$identifier])) {
            return null;
        }

        return $this->registeredForms[$identifier]['path'] ?? null;
    }

    /**
     * Get the path for a specific form identifier (ignoring disabled status)
     *
     * @noinspection PhpUnused
     */
    public function getFormPath(string $identifier): ?string
    {
        return $this->registeredForms[$identifier]['path'] ?? null;
    }

    /**
     * Get forms in TCA items format for select fields (only active forms)
     *
     * @return array<int, array{0: string, 1: string}>
     * @noinspection PhpUnused
     */
    public function getTcaItems(): array
    {
        $items = [];

        foreach ($this->registeredForms as $identifier => $form) {
            // Skip disabled forms
            if (isset($this->disabledIdentifiers[$identifier])) {
                continue;
            }

            $items[] = [
                $form['label'],
                $identifier,
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
