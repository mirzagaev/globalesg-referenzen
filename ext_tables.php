<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		    'GSG.Globale',
		    'Referenz',
		    'Referenz'
		);

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('globale', 'Configuration/TypoScript', 'Referenzen');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_globale_domain_model_referenz', 'EXT:globale/Resources/Private/Language/locallang_csh_tx_globale_domain_model_referenz.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_globale_domain_model_referenz');

    }
);
