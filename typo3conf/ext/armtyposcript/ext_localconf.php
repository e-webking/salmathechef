<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'ARM.' . $_EXTKEY,
    'Typoscript',
    array(
        'Typoscript' => 'default',
    ),
    // non-cacheable actions
    array(
        'Typoscript' => 'default',
    )
);