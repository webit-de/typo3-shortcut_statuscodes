# Changelog

2021-01-29 Dan Untenzu <untenzu@webit.de>

  * 6.0.1
  * BUGFIX Restore different status codes for each shortcut mode - Thanks to
    Christian Fries

2021-01-29 Dan Untenzu <untenzu@webit.de>

  * 6.0.0
  * FEATURE Compatibility with TYPO3 10.4 - Thanks to Christian Fries
  * TASK Drop support for TYPO3 8.7
  * TASK Drop support for PHP < 7.2
  * BUGFIX Change namespace
  * FEATURE Remove language selection field - Braking Change!
    No replacement available (see #12), existing redirects will use
    the same language as the shortcut page now

2020-10-12 Dan Untenzu <untenzu@webit.de>

  * 5.1.1
  * BUGFIX Composer: Remove invalid short name

2020-05-19 Dan Untenzu <untenzu@webit.de>

  * 5.1.0
  * FEATURE Raise supported PHP versions (7.3 & 7.4)

2020-01-23 Dan Untenzu <untenzu@webit.de>

  * 5.0.0
  * FEATURE Keep existing query arguments
  * TASK Drop support for TYPO3 7.6

2019-04-24 Dan Untenzu <untenzu@webit.de>

  * 4.2.0
  * FEATURE Compatibility with TYPO3 9.5 - Thanks to Florian Wessels / Bitmotion

2018-08-20 Dan Untenzu <untenzu@webit.de>

  * 4.1.1
  * BUGFIX Fix TCA config of select field to remove deprecation message - Thanks to Mathias Brodala

2018-02-05 Dan Untenzu <untenzu@webit.de>

  * 4.1.0
  * FEATURE Extend license

2017-08-15 Dan Untenzu <untenzu@webit.de>

  * 4.0.0
  * TASK Change composer vendor name → require »webit-de/shortcut_statuscodes«
    instead of »webit/shortcut_statuscodes«

2017-07-06 Dan Untenzu <untenzu@webit.de>

  * 3.0.0
  * FEATURE Switch to PSR-2
  * TASK Drop support for TYPO3 6.2

2017-07-06 Dan Untenzu <untenzu@webit.de>

  * 2.2.0
  * FEATURE Compatibility with TYPO3 8.7

2017-05-06 Dan Untenzu <untenzu@webit.de>

  * 2.1.1
  * BUGFIX Database analyzer espects a different SQL format
  * TASK Remove version from composer declaration

2016-12-20 

  * 2.1.0
  * FEATURE Allow explicit link target language selection - Thanks to Leonie Bitto <leonie@netcreators.nl>
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
