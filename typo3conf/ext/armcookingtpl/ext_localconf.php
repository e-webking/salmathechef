<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY])) {
    $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/Tsconfig/pageTSConfig.txt">');

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['tpl_preset'] = 'EXT:armcookingtpl/Configuration/RTE/Default.yaml';