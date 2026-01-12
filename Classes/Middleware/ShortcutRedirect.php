<?php

declare(strict_types=1);

namespace WebitDe\ShortcutStatuscodes\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Routing\PageArguments;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\ErrorController;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Frontend\Page\PageAccessFailureReasons;
use TYPO3\CMS\Frontend\Page\PageInformation;

/**
 * Checks shortcuts and redirects to the target with an appropriate status code.
 */
class ShortcutRedirect implements MiddlewareInterface
{
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
        $pageInformation = $request->getAttribute('frontend.page.information');
        $redirectToUri = $this->getRedirectUri($request);

        if ($redirectToUri !== null && $redirectToUri !== (string)$request->getUri()) {
            $statusCode = $this->getRedirectStatusCode($pageInformation);
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
        $redirectToUri = $this->getRedirectUriForShortcut($request);

        return $redirectToUri ?? $this->getRedirectUriForMountPoint($request);
    }

    /**
     * For shortcuts to a specified page, use status code 301. For all the others, use 307.
     *
     * @return int
     */
    protected function getRedirectStatusCode(PageInformation $pageInformation): int
    {
        $originalShortcutPage = $pageInformation->getOriginalShortcutPageRecord();
        if (!empty($originalShortcutPage) && ($originalShortcutPage['shortcut_mode'] === PageRepository::SHORTCUT_MODE_NONE || $originalShortcutPage['shortcut_mode'] === PageRepository::SHORTCUT_MODE_FIRST_SUBPAGE)) {
            return 301;
        }

        return 307;
    }

    /**
     * @todo Copied from ShortcutAndMountPointRedirect
     * Returns URI of target page, if the current page is a Shortcut.
     *
     * If the current page is of type shortcut and accessed directly via its URL,
     * the user will be redirected to shortcut target.
     */
    protected function getRedirectUriForShortcut(ServerRequestInterface $request): ?string
    {
        $pageInformation = $request->getAttribute('frontend.page.information');
        $originalShortcutPageRecord = $pageInformation->getOriginalShortcutPageRecord();
        if (!empty($originalShortcutPageRecord)
            && $originalShortcutPageRecord['doktype'] == PageRepository::DOKTYPE_SHORTCUT
        ) {
            // Check if the shortcut page is actually on the current site, if not, this is a "page not found"
            // because the request was www.mydomain.com/?id=23 where page ID 23 (which is a shortcut) is on another domain/site.
            if ((int)($request->getQueryParams()['id'] ?? 0) > 0) {
                try {
                    $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
                    $targetSite = $siteFinder->getSiteByPageId($originalShortcutPageRecord['l10n_parent'] ?: $originalShortcutPageRecord['uid']);
                } catch (SiteNotFoundException) {
                    $targetSite = null;
                }
                $site = $request->getAttribute('site');
                if ($targetSite !== $site) {
                    $response = GeneralUtility::makeInstance(ErrorController::class)->pageNotFoundAction(
                        $request,
                        'ID was outside the domain',
                        ['code' => PageAccessFailureReasons::ACCESS_DENIED_HOST_PAGE_MISMATCH]
                    );
                    throw new ImmediateResponseException($response, 1638022483);
                }
            }
            return $this->getUriToCurrentPageForRedirect($request);
        }
        return null;
    }

    /**
     * @todo Copied from ShortcutAndMountPointRedirect
     * Returns URI of target page, if the current page is an overlaid mountpoint.
     *
     * If the current page is of type mountpoint and should be overlaid with the contents of the mountpoint page
     * and is accessed directly, the user will be redirected to the mountpoint context.
     */
    protected function getRedirectUriForMountPoint(ServerRequestInterface $request): ?string
    {
        $pageInformation = $request->getAttribute('frontend.page.information');
        $originalMountPointPageRecord = $pageInformation->getOriginalMountPointPageRecord();
        if (!empty($originalMountPointPageRecord)
            && (int)$originalMountPointPageRecord['doktype'] === PageRepository::DOKTYPE_MOUNTPOINT
        ) {
            return $this->getUriToCurrentPageForRedirect($request);
        }
        return null;
    }

    /**
     * @todo Copied from ShortcutAndMountPointRedirect
     */
    protected function getUriToCurrentPageForRedirect(ServerRequestInterface $request): string
    {
        $pageInformation = $request->getAttribute('frontend.page.information');
        $pageRecord = $pageInformation->getPageRecord();
        $parameter = $pageRecord['uid'];
        /** @var PageArguments $pageArguments */
        $pageArguments = $request->getAttribute('routing');
        $type = $pageArguments->getPageType();
        if ($type) {
            $parameter .= ',' . $type;
        }
        $tsfe = $request->getAttribute('frontend.controller');
        return GeneralUtility::makeInstance(ContentObjectRenderer::class, $tsfe)->createUrl([
            'parameter' => $parameter,
            'addQueryString' => 'untrusted',
            'addQueryString.' => ['exclude' => 'id,type'],
            'forceAbsoluteUrl' => true,
        ]);
    }
}
