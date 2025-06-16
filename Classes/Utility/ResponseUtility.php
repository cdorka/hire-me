<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Utility;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Frontend\Controller\ErrorController;

class ResponseUtility
{
    /**
     * @throws PageNotFoundException|ImmediateResponseException
     */
    public static function handleFallbackOrErrorResponse(
        int|string|null $pid,
        UriBuilder $uriBuilder,
        string $errorMessage = 'Entity not found'
    ): ResponseInterface {
        $fallbackPageId = filter_var($pid, FILTER_VALIDATE_INT) ?: null;

        if ($fallbackPageId !== null) {
            // Use the controller's UriBuilder which is already initialized
            $uri = $uriBuilder
                ->reset()
                ->setTargetPageUid(targetPageUid: $fallbackPageId)
                ->buildFrontendUri();

            return new RedirectResponse($uri, 302);
        }

        // 404 handling
        $errorController = GeneralUtility::makeInstance(ErrorController::class);
        $response = $errorController->pageNotFoundAction(
            $GLOBALS['TYPO3_REQUEST'],
            $errorMessage
        );

        throw new ImmediateResponseException($response, 1234567890);
    }
}
