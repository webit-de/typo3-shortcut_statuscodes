<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// xclass core controller
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController'] = array(
    'className' => 'Webit\\ShortcutStatuscodes\\Controller\\ShortcutStatuscodesTypoScriptFrontendController'
);
