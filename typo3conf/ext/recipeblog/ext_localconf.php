<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{
        
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Banner',
            [
                'Recipe' => 'banner'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'banner'
            ]
        );
        
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Category',
            [
                'Recipe' => 'category'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'category'
            ]
        );
        
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Popular',
            [
                'Recipe' => 'popular'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'popular'
            ]
        );
        
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Tags',
            [
                'Recipe' => 'tags'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'tags'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'List',
            [
                'Recipe' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'list, show'
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Search',
            [
                'Recipe' => 'search'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'search'
            ]
        );
        
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'ARM.Recipeblog',
            'Single',
            [
                'Recipe' => 'single'
            ],
            // non-cacheable actions
            [
                'Recipe' => 'single'
            ]
        );
        
	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					list {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_list.svg
						title = LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_list
						description = LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_list.description
						tt_content_defValues {
							CType = list
							list_type = recipeblog_list
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
