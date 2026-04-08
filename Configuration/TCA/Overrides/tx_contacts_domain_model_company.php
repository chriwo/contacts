<?php

defined('TYPO3') || die();

use Extcode\Contacts\Domain\Model\Dto\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

if ($extensionConfiguration->isCategoryRestricted()) {
    $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'] =
        $extensionConfiguration->getCategoryRestriction() .
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'];

    $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'] =
        $extensionConfiguration->getCategoryRestriction() .
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'];
}
