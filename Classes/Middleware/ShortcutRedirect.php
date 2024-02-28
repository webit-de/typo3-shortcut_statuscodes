<?php

declare(strict_types=1);

namespace WebitDe\ShortcutStatuscodes\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;

/**
 * Checks shortcuts and redirects to the target with an appropriate status code.
 */
class ShortcutRedirect implements MiddlewareInterface
{
    /**
     * @var TypoScriptFrontendController
     */
    private $controller;

    public function __construct(TypoScriptFrontendController $controller = null)
    {
        $this->controller = $controller ?: $GLOBALS['TSFE'];
    }

    /**
     * Processes the server request and returns the response.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $redirectToUri = $this->getRedirectUri($request);

        if ($redirectToUri !== null && $redirectToUri !== (string)$request->getUri()) {
            $statusCode = $this->getRedirectStatusCode();

            // Taken from \TYPO3\CMS\Frontend\Middleware\ShortcutAndMountPointRedirect
            $this->controller->releaseLocks();

            return new RedirectResponse($redirectToUri, $statusCode);
        }

        return $handler->handle($request);
    }

    /**
     * Retrieves the redirect URI based on the provided request.
     * Taken from \TYPO3\CMS\Frontend\Middleware\ShortcutAndMountPointRedirect
     *
     * @param ServerRequestInterface $request
     *
     * @return string|null
     */
    protected function getRedirectUri(ServerRequestInterface $request): ?string
    {
        $redirectToUri = $this->controller->getRedirectUriForShortcut($request);

        return $redirectToUri ?? $this->controller->getRedirectUriForMountPoint($request);
    }

    /**
     * For shortcuts to a specified page, use status code 301. For all the others, use 307.
     *
     * @return int
     */
    protected function getRedirectStatusCode(): int
    {
        $originalShortcutPage = $this->controller->__get('originalShortcutPage');
        if (!empty($originalShortcutPage) && ($originalShortcutPage['shortcut_mode'] === PageRepository::SHORTCUT_MODE_NONE || $originalShortcutPage['shortcut_mode'] === PageRepository::SHORTCUT_MODE_FIRST_SUBPAGE)) {
            return 301;
        }

        return 307;
    }
}
