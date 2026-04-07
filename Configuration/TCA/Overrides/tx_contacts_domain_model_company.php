<?php

defined('TYPO3') || die();

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

// category restriction based on settings in extension manager
$categoryRestrictionSetting = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('contacts', 'categoryRestriction');

if ($categoryRestrictionSetting) {
    $categoryRestriction = '';
    $categoryRestriction = match ($categoryRestrictionSetting) {
        'current_pid' => ' AND sys_category.pid=###CURRENT_PID### ',
        'siteroot' => ' AND sys_category.pid IN (###SITEROOT###) ',
        'page_tsconfig' => ' AND sys_category.pid IN (###PAGE_TSCONFIG_IDLIST###) ',
        default => '',
    };

    // prepend category restriction at the beginning of foreign_table_where
    if ($categoryRestriction !== '' && $categoryRestriction !== '0') {
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'] = $categoryRestriction .
            $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'];
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'] = $categoryRestriction .
            $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'];
    }
}
