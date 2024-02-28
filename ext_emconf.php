<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Different HTTP statuscodes for shortcuts',
    'description' => 'Restore the use of different HTTP statuscodes for shortcuts (307 redirect to first subpage, random subpage, parent page – 301 for redirect to explicitly selected page)',
    'category' => 'misc',
    'author' => 'Dan Untenzu',
    'author_email' => 'untenzu@webit.de',
    'author_company' => '',
    'state' => 'stable',
    'version' => '8.0.0',
    'constraints' => [
        'depends' => ['typo3' => '11.5.36-12.4.99'],
        'conflicts' => [],
        'suggests' => [],
    ],
];
