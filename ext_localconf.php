<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Frontend\Middleware\ShortcutAndMountPointRedirect::class] = [
    'className' => \WebitDe\ShortcutStatuscodes\Middleware\ShortcutAndMountPointRedirect::class
];
