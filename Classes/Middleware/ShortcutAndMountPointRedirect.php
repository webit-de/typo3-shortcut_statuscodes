<?php
namespace  Webit\ShortcutStatuscodes\Middleware;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\RedirectResponse;

/**
 * Checks mount points, shortcuts and redirects to the target.
 * Alternatively, checks if the current page is an redirect to an external page
 *
 * @internal this middleware might get removed in TYPO3 v10.0.
 */
class ShortcutAndMountPointRedirect extends \TYPO3\CMS\Frontend\Middleware\ShortcutAndMountPointRedirect
{

    /**
     * @param ServerRequestInterface  $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Check for shortcut page and mount point redirect
        $redirectToUri = $this->getRedirectUri($request);

        if ($redirectToUri !== null && $redirectToUri !== (string)$request->getUri()) {
            return new RedirectResponse($redirectToUri, 301);
        }

        return parent::process($request, $handler);
    }
}
