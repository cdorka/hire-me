<?php

/**
 * Generic meta tag generator
 * php version 8.2
 *
 * @category     SEO
 * @package      ChristianDorka\HireMe\Seo\MetaTag
 * @license      GPL-3.0-or-later
 * @author       Christian Dorka <mail@christiandorka.de>
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Seo\MetaTag;

use CpCompartner\Base\Core\Pattern\Result;
use TYPO3\CMS\Core\Imaging\ImageManipulation\CropVariantCollection;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Resource\ProcessedFile;
use TYPO3\CMS\Extbase\Service\ImageService;
use TYPO3\CMS\Extbase\Domain\Model\FileReference as ExtbaseFileReference;

/**
 * Generates meta tags for any object that implements the required getter methods
 * Copied and modified from TYPO3 core MetaTagGenerator for pages.
 * <code>
 * // Usage example ...
 * use TYPO3\CMS\Core\Utility\GeneralUtility;
 * use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
 * use TYPO3\CMS\Extbase\Service\ImageService;
 * use ChristianDorka\HireMe\Seo\MetaTag\GenericMetaTagGenerator;
 * use RuntimeException;
 *
 * // Generate meta tags with default method names
 * $metaTagGenerator = GeneralUtility::makeInstance(
 *     MetaTagGenerator::class,
 *     GeneralUtility::makeInstance(ImageService::class),
 *     GeneralUtility::makeInstance(MetaTagManagerRegistry::class)
 * );
 *
 * // Generate meta tags with custom method names
 * $options = [
 *     'methodNames' => [
 *         'description' => 'getMetaDescription',
 *         'ogTitle' => 'getPageTitle',
 *         'ogDescription' => 'getMetaDescription',
 *         'ogImage' => 'getPreviewImage',
 *         'twitterTitle' => 'getPageTitle',
 *         'twitterDescription' => 'getMetaDescription',
 *         'twitterImage' => 'getPreviewImage',
 *         'twitterCard' => 'getSocialCardType',
 *         'noIndex' => 'isHiddenInSearch',
 *         'noFollow' => 'isNoFollow'
 *     ]
 * ];
 *
 * $result = $metaTagGenerator->generate($object, $options);
 *
 * // Check the result and handle accordingly
 * if ($result->isError()) {
 *     // Handle specific error codes
 *     if ($result->getErrorCode() === GenericMetaTagGenerator::ERROR_OBJECT_MISSING_OG_METHODS) {
 *         throw new RuntimeException($result->getErrorData()['message'] ?? $result->getErrorCode);
 *     }
 * }
 * </code>
 *
 * @category SEO
 * @package  ChristianDorka\HireMe\Seo\MetaTag
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  GPL-3.0-or-later
 */
readonly class GenericMetaTagGenerator
{
    /** @noinspection PhpMissingClassConstantTypeInspection */
    const ERROR_OBJECT_MISSING_OG_METHODS = 1742889190;

    /**
     * Default method names to use when calling getters on objects
     *
     * @noinspection PhpMissingClassConstantTypeInspection
     */
    private const DEFAULT_METHOD_NAMES = [
        'description' => 'getDescription',
        'ogTitle' => 'getOgTitle',
        'ogDescription' => 'getOgDescription',
        'ogImage' => 'getOgImage',
        'twitterTitle' => 'getTwitterTitle',
        'twitterDescription' => 'getTwitterDescription',
        'twitterImage' => 'getTwitterImage',
        'twitterCard' => 'getTwitterCard',
        'noIndex' => 'getNoIndex',
        'noFollow' => 'getNoFollow'
    ];

    public function __construct(
        private MetaTagManagerRegistry $metaTagManagerRegistry,
        private ImageService $imageService
    ) {
    }

    /**
     * Generate the meta tags for an object and add them to frontend using the MetaTag API
     * Object must implement the necessary getter methods
     *
     * @param object               $subject Any object with getter methods for meta properties
     * @param array<string, mixed> $options Options for customizing behavior
     *                                      - methodNames: array of custom method names to use
     */
    public function generate(object $subject, array $options = []): Result
    {
        // Merge provided method names with defaults
        $methodNames = $options['methodNames'] ?? [];
        $methodNames = array_merge(self::DEFAULT_METHOD_NAMES, $methodNames);

        // Validate that all required methods exist on the subject
        $validationResult = $this->validateRequiredMethods($subject, $methodNames);
        if ($validationResult->isError()) {
            return $validationResult;
        }

        $twitterCardTagRequired = false;

        // Description meta tag - use description from og:description if available
        if ($this->callMethodIfExists($subject, $methodNames['description'])) {
            $this->addMetaTagIfNotEmpty(
                'description',
                $this->callMethodIfExists($subject, $methodNames['description'])
            );
        }

        // Opengraph title
        if ($this->addMetaTagIfValueExists(
            'og:title',
            $this->callMethodIfExists($subject, $methodNames['ogTitle'])
        )) {
            $twitterCardTagRequired = true;
        }

        // Opengraph description
        if ($this->addMetaTagIfValueExists(
            'og:description',
            $this->callMethodIfExists($subject, $methodNames['ogDescription'])
        )) {
            $twitterCardTagRequired = true;
        }

        // Opengraph image
        $ogImage = $this->callMethodIfExists($subject, $methodNames['ogImage']);
        if ($ogImage instanceof ExtbaseFileReference) {
            $this->processOgImage($ogImage);
            $twitterCardTagRequired = true;
        }

        // Twitter opengraph title
        if ($this->addMetaTagIfValueExists(
            'twitter:title',
            $this->callMethodIfExists($subject, $methodNames['twitterTitle'])
        )) {
            $twitterCardTagRequired = true;
        }

        // Twitter opengraph description
        if ($this->addMetaTagIfValueExists(
            'twitter:description',
            $this->callMethodIfExists($subject, $methodNames['twitterDescription'])
        )) {
            $twitterCardTagRequired = true;
        }

        // Twitter opengraph image
        $twitterImage = $this->callMethodIfExists($subject, $methodNames['twitterImage']);
        if ($twitterImage instanceof ExtbaseFileReference) {
            $this->processTwitterImage($twitterImage);
            $twitterCardTagRequired = true;
        }

        // Twitter card
        if ($twitterCardTagRequired) {
            $this->addMetaTagIfValueExists(
                'twitter:card',
                $this->callMethodIfExists($subject, $methodNames['twitterCard'])
            );
        }

        // Robots meta tag
        $noIndex = (bool)$this->callMethodIfExists($subject, $methodNames['noIndex']);
        $noFollow = (bool)$this->callMethodIfExists($subject, $methodNames['noFollow']);
        $this->addRobotsMetaTag($noIndex, $noFollow);

        // Return empty success result
        return Result::success();
    }

    /**
     * Validates that all required methods exist on the subject object
     *
     * @param object                $subject     The object to validate
     * @param array<string, string> $methodNames The method names to check
     *
     * @return Result Returns success if all methods exist, error otherwise
     */
    private function validateRequiredMethods(object $subject, array $methodNames): Result
    {
        // Check if each method exists on the subject
        foreach ($methodNames as $property => $methodName) {
            if (!method_exists($subject, $methodName)) {
                return Result::error(
                    self::ERROR_OBJECT_MISSING_OG_METHODS,
                    [
                        "message" => sprintf(
                            'Required method "%s" for property "%s" does not exist on the provided object',
                            $methodName,
                            $property
                        )
                    ]
                );
            }
        }

        // All methods exist
        return Result::success();
    }


    /**
     * Call a method on an object if it exists
     *
     * @param object $object     The object to call the method on
     * @param string $methodName The method name to call
     *
     * @return mixed|null The return value of the method or null if method doesn't exist
     */
    private function callMethodIfExists(object $object, string $methodName): mixed
    {
        if (method_exists($object, $methodName)) {
            return $object->$methodName();
        }

        return null;
    }

    /**
     * Add a meta tag if the value is not empty
     *
     * @noinspection PhpSameParameterValueInspection
     */
    private function addMetaTagIfNotEmpty(string $property, ?string $value): void
    {
        if (empty($value)) {
            return;
        }

        $manager = $this->metaTagManagerRegistry->getManagerForProperty($property);
        $manager->addProperty($property, $value);
    }

    /**
     * Add a meta tag if the value exists and is not empty
     *
     * @param string $property The meta tag property
     * @param mixed  $value    The value to check
     *
     * @return bool True if the meta tag was added
     */
    private function addMetaTagIfValueExists(string $property, mixed $value): bool
    {
        if (empty($value)) {
            return false;
        }

        if (!is_string($value)) {
            return false;
        }

        $manager = $this->metaTagManagerRegistry->getManagerForProperty($property);
        $manager->addProperty($property, $value);

        return true;
    }

    /**
     * Process and add OpenGraph image
     *
     * @param ExtbaseFileReference $fileReference
     */
    private function processOgImage(ExtbaseFileReference $fileReference): void
    {
        $manager = $this->metaTagManagerRegistry->getManagerForProperty('og:image');
        $image = $this->generateSocialImage($fileReference);

        $subProperties = [
            'url' => $image['url'],
            'width' => $image['width'],
            'height' => $image['height'],
        ];

        if (!empty($image['alternative'])) {
            $subProperties['alt'] = $image['alternative'];
        }

        $manager->addProperty('og:image', $image['url'], $subProperties);
    }

    /**
     * Generate social image data from file references
     *
     * @param ExtbaseFileReference $fileReference
     *
     * @return array{url: string, width: int, height: int, alternative: string|null}
     */
    private function generateSocialImage(ExtbaseFileReference $fileReference): array
    {
        $image = $this->processSocialImage($fileReference);
        return [
            'url' => $this->imageService->getImageUri($image, true),
            'width' => (int)$image->getProperty('width'),
            'height' => (int)$image->getProperty('height'),
            'alternative' => $image->getProperty('alternative'),
        ];
    }

    /**
     * Process a social image file reference
     */
    private function processSocialImage(ExtbaseFileReference $fileReference): FileInterface
    {
        $originalResource = $fileReference->getOriginalResource();
        $properties = $originalResource->getProperties();
        $cropVariantCollection = CropVariantCollection::create((string)($properties['crop'] ?? ''));
        $cropVariantName = ($properties['cropVariant'] ?? '') ?: 'social';
        $cropArea = $cropVariantCollection->getCropArea($cropVariantName);
        $crop = $cropArea->makeAbsoluteBasedOnFile($originalResource);

        $processingConfiguration = [
            'crop' => $crop,
            'maxWidth' => 2000,
        ];

        // The image needs to be processed if:
        //  - the image width is greater than the defined maximum width, or
        //  - there is a cropping other than the full image defined
        $needsProcessing = $originalResource->getProperty('width') > $processingConfiguration['maxWidth']
            || !$cropArea->isEmpty();

        if (!$needsProcessing) {
            return $originalResource->getOriginalFile();
        }

        return $originalResource->getOriginalFile()->process(
            ProcessedFile::CONTEXT_IMAGECROPSCALEMASK,
            $processingConfiguration
        );
    }

    /**
     * Process and add Twitter image
     *
     * @param ExtbaseFileReference $fileReference
     */
    private function processTwitterImage(ExtbaseFileReference $fileReference): void
    {
        $manager = $this->metaTagManagerRegistry->getManagerForProperty('twitter:image');
        $image = $this->generateSocialImage($fileReference);

        $subProperties = [];
        if (!empty($image['alternative'])) {
            $subProperties['alt'] = $image['alternative'];
        }

        $manager->addProperty('twitter:image', $image['url'], $subProperties);
    }

    /**
     * Add robots meta tag based on noIndex and noFollow flags
     */
    private function addRobotsMetaTag(bool $noIndex, bool $noFollow): void
    {
        $indexValue = $noIndex ? 'noindex' : 'index';
        $followValue = $noFollow ? 'nofollow' : 'follow';

        if ($noIndex || $noFollow) {
            $manager = $this->metaTagManagerRegistry->getManagerForProperty('robots');
            $manager->addProperty('robots', $indexValue . ',' . $followValue);
        }
    }
}
