<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Different HTTP statuscodes for shortcuts',
    'description' => 'Restore the use of different HTTP statuscodes for shortcuts (307 redirect to first subpage, random subpage, parent page – 301 for redirect to explicitly selected page)',
    'category' => 'misc',
    'author' => 'Dan Untenzu',
    'author_email' => 'untenzu@webit.de',
    'author_company' => '',
    'state' => 'stable',
    'version' => '6.1.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '10.4.99-12.4.99',
            'php' => '7.2.0-8.1.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);
