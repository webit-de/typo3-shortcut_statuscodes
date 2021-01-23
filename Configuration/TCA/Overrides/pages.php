<?php

// TODO: Change namespace of PageRepository when dropping support for TYPO3 9
// https://docs.typo3.org/c/typo3/cms-core/10.2/en-us/Changelog/10.0/Deprecation-88746-PageRepositoryPHPClassMovedFromFrontendToCoreExtension.html
$additionalColumns = array(
    'tx_shortcutstatuscodes_language' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:shortcut_statuscodes/Resources/Private/Language/locallang_tca.xlf:pages.tx_shortcutstatuscodes_language_formlabel',
        'displayCond' => 'FIELD:shortcut_mode:=:' . \TYPO3\CMS\Frontend\Page\PageRepository::SHORTCUT_MODE_NONE,
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectSingle',
            'special' => 'languages',
            'items' => array(
                array(
                    'LLL:EXT:shortcut_statuscodes/Resources/Private/Language/locallang_tca.xlf:pages.tx_shortcutstatuscodes_void_option',
                    -1
                ),
            ),
        )
    ),
);

$GLOBALS['TCA']['pages']['ctrl']['requestUpdate'] .= ($GLOBALS['TCA']['pages']['ctrl']['requestUpdate'] ? ',' : '') . 'shortcut_mode';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    $additionalColumns
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'shortcut',
    'tx_shortcutstatuscodes_language',
    'after:shortcut_mode'
);
