<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'ARM Recipes');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_category', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_category');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_tag', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_tag.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_tag');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_amazonad', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_amazonad.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_amazonad');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_recipe', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_recipe.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_recipe');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_cookingstep', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_cookingstep.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_cookingstep');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_ingredient', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_ingredient.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_ingredient');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_recipeingredient', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_recipeingredient.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_recipeingredient');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipeblog_domain_model_comment', 'EXT:recipeblog/Resources/Private/Language/locallang_csh_tx_recipeblog_domain_model_comment.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipeblog_domain_model_comment');

    },
    $_EXTKEY
);
