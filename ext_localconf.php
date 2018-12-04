<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


if (class_exists('TYPO3\\CMS\\Frontend\\Middleware\\ShortcutAndMountPointRedirect')) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Frontend\Middleware\ShortcutAndMountPointRedirect::class] = [
        'className' => \Webit\ShortcutStatuscodes\Middleware\ShortcutAndMountPointRedirect::class,
    ];
} else {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class] = [
        'className' => \Webit\ShortcutStatuscodes\Controller\ShortcutStatuscodesTypoScriptFrontendController::class,
    ];
}


