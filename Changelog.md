Changelog
=========

2016-12-20 Leonie Bitto <leonie@netcreators.nl>

  * 2.1.0
  * FEATURE Allow explicit link target language selection.
    - BUGFIX Define default value for DB field pages.tx_shortcutstatuscodes_language to be -1, which
      equals \Webit\ShortcutStatuscodes\Controller\ShortcutStatuscodesTypoScriptFrontendController::LANGUAGE_OPTION_NONE.
    - BUGFIX Allow links to localized pages without default language content.

2016-08-24 Dan Untenzu <untenzu@webit.de>

  * 2.0.0
  * FEATURE Reenable ::class keyword for class name resolution
  * TASK Drop support for PHP < 5.5.0

2016-08-24 Dan Untenzu <untenzu@webit.de>

  * 1.0.1
  * BUGFIX Compatibility fix for TYPO3 6.2 with PHP < 5.5
    (prevent fatal error → https://github.com/webit-de/typo3-shortcut_statuscodes/issues/1 )

2016-03-11 Dan Untenzu <untenzu@webit.de>

  * 1.0.0
  * FEATURE Enable different HTTP statuscodes for shortcuts
