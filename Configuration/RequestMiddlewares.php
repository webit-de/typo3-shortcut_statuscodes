<?php

return [
    'frontend' => [
        'webitde/shortcut-statuscodes/shortcut-redirect' => [
            'target' => \WebitDe\ShortcutStatuscodes\Middleware\ShortcutRedirect::class,
            'before' => [
                'typo3/cms-frontend/shortcut-and-mountpoint-redirect',
            ],
            'after' => [
                'typo3/cms-frontend/prepare-tsfe-rendering',
            ],
        ],
    ],
];
