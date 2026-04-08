<?php

declare(strict_types=1);

namespace Extcode\Contacts\Domain\Model\Dto;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration as Typo3CoreExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ExtensionConfiguration
{
    protected string $categoryRestriction = '';

    public string $googleMapsLibrary = '';

    public string $googleMapsApiKey = '';

    public function __construct()
    {
        $configuration = [];

        try {
            $extensionConfiguration = GeneralUtility::makeInstance(Typo3CoreExtensionConfiguration::class);
            $configuration = $extensionConfiguration->get('contacts');
        } catch (\Exception) {
        }

        if (is_array($configuration)) {
            foreach ($configuration as $key => $value) {
                if (property_exists(self::class, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function isCategoryRestricted(): bool
    {
        return $this->categoryRestriction !== '';
    }

    public function getCategoryRestriction(): string
    {
        return match ($this->categoryRestriction) {
            'current_pid' => ' AND {#sys_category}.{#pid}=###CURRENT_PID### ',
            'siteroot' => ' AND {#sys_category}.{#pid} IN (###SITE:rootPageId###) ',
            'page_tsconfig' => ' AND {#sys_category}.{#pid} IN (###PAGE_TSCONFIG_IDLIST###) ',
            default => '',
        };
    }

    public function isMapsUsageEnabled(): bool
    {
        return $this->googleMapsLibrary !== '' && $this->googleMapsLibrary !== '0'
            && ($this->googleMapsApiKey !== '' && $this->googleMapsApiKey !== '0');
    }

    public function getMapsApiUrl(): string
    {
        return $this->googleMapsLibrary;
    }

    public function getMapsApiKey(): string
    {
        return $this->googleMapsApiKey;
    }
}
