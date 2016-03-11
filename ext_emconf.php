<?php

########################################################################
# Extension Manager/Repository config file for ext "shortcut_statuscodes".
#
# Auto generated 01-01-1970 00:00
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Different HTTP statuscodes for shortcuts',
	'description' => 'Restore the use of different HTTP statuscodes for shortcuts (307 redirect to first subpage, random subpage, parent page – 301 for redirect to explicitly selected page)',
	'category' => 'misc',
	'author' => 'Dan Untenzu',
	'author_email' => 'untenzu@webit.de',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-7.6.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>