<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function () {
    $pluginSignature = ExtensionUtility::registerPlugin(
        'Contacts',
        'ContactsContacts',
        'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf:tx_contacts.plugin.contacts',
        'module-contacts',
        'contacts',
        'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf:tx_contacts.plugin.contacts.description',
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--div--;LLL:EXT:contacts/Resources/Private/Language/locallang_tca.xlf:tt_content.div.contacts_configuration,pi_flexform',
        $pluginSignature,
        'after:subheader'
    );

    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:contacts/Configuration/FlexForms/ContactsPlugin.xml',
        $pluginSignature
    );
})();
