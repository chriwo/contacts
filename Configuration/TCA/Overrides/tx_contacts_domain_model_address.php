<?php

defined('TYPO3') || die();

use Extcode\Contacts\Domain\Model\Dto\ExtensionConfiguration;
use Extcode\Contacts\Hooks\GoogleMapHook;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
if ($extensionConfiguration->isMapsUsageEnabled()) {
    $googleMapsField = [
        'coords' => [
            'exclude' => 1,
            'config' => [
                'type' => 'user',
                'userFunc' => GoogleMapHook::class . '->render',
                'parameters' => [],
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns(
        'tx_contacts_domain_model_address',
        $googleMapsField
    );
    ExtensionManagementUtility::addToAllTCAtypes(
        'tx_contacts_domain_model_address',
        '--linebreak--, coords',
        '',
        'after:lon'
    );
}
