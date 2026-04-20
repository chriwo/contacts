<?php

defined('TYPO3') || die();

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['itemGroups']['contacts'] =
    'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf:tx_contacts.module.contacts';

$GLOBALS['TCA']['tt_content']['columns']['tx_contacts_domain_model_address']['config']['type'] = 'passthrough';
$GLOBALS['TCA']['tt_content']['columns']['tx_contacts_domain_model_company']['config']['type'] = 'passthrough';
$GLOBALS['TCA']['tt_content']['columns']['tx_contacts_domain_model_contact']['config']['type'] = 'passthrough';
