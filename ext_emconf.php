<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Different HTTP statuscodes for shortcuts',
    'description' => 'Restore the use of different HTTP statuscodes for shortcuts (307 redirect to first subpage, random subpage, parent page – 301 for redirect to explicitly selected page)',
    'category' => 'misc',
    'author' => 'Dan Untenzu',
    'author_email' => 'untenzu@webit.de',
    'author_company' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '5.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '9.5.0-10.4.99',
            'php' => '5.6.0-7.4.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);
