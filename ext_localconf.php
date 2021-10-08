<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		    'GSG.Globale',
		    'Referenz',
		    [
		        'Referenz' => 'list, show',
		    ],
		    // non-cacheable actions
		    [
		        'Referenz' => '',
		    ]
		);
	}
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
    config.pageTitleProviders {
        own {
            provider = GSG\Globale\PageTitle\PageTitleProvider
            before = record
            after = altPageTitle
        }
    }
'));