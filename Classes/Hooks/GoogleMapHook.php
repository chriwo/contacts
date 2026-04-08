<?php

namespace Extcode\Contacts\Hooks;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Dto\ExtensionConfiguration;
use Extcode\Contacts\Domain\Repository\CountryRepository;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

class GoogleMapHook
{
    protected CountryRepository $countryRepository;

    protected array $pluginSettings = [];

    protected string $idPrefix = '';

    protected string $tableName = '';

    protected string $addressId = '';

    protected string $latFieldName = 'lat';

    protected string $lonFieldName = 'lon';

    protected float $latitude = 51.439310;

    protected float $longitude = 9.997579;

    protected function init(array $params): void
    {
        $this->countryRepository = GeneralUtility::makeInstance(CountryRepository::class);

        $querySettings = $this->countryRepository->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->countryRepository->setDefaultQuerySettings($querySettings);

        $this->tableName = $params['table'];
        $this->addressId = $params['row']['uid'];
        $this->idPrefix = 'tx-contacts-address-' . $this->addressId;

        $this->setLatLonFieldNames($params);
        $this->setLatLon($params);
    }

    /**
     * Renders the Google map.
     */
    public function render(array $params, $fObj): string
    {
        $this->init($params);

        $out = $this->getJavaScript($this->getMapApiUrl());
        $out .= $this->getInputFields($params);

        return $out;
    }

    protected function concatenateFieldsToAddress(array $params): string
    {
        $address = [];

        if (!empty($params['row']['street'])) {
            $street = $params['row']['street'];
            if (!empty($params['row']['street_number'])) {
                $street .= ' ' . $params['row']['street_number'];
            }
            $address[] = $street;
        }
        if (!empty($params['row']['zip'])) {
            $address[] = $params['row']['zip'];
        }
        if (!empty($params['row']['city'])) {
            $address[] = $params['row']['city'];
        }

        $country = $this->retrieveCountryCode((int)$params['row']['country'][0]);
        if ($country !== '' && $country !== '0') {
            $address[] = strtoupper($country);
        }

        $addressString = implode(', ', $address);

        return $addressString;
    }

    protected function retrieveCountryCode(int $countryId): string
    {
        $country = $this->countryRepository->findOneBy(['uid' => $countryId]);

        if ($country instanceof DomainObjectInterface) {
            $countryCode = $country->getIso2();

            return $countryCode;
        }

        return '';
    }

    protected function getJavaScript(string $googleMapsLibrary): string
    {
        $version = VersionNumberUtility::convertVersionNumberToInteger(GeneralUtility::makeInstance(Typo3Version::class)->getVersion());

        $out = '';

        $out .= '<script type="text/javascript" src="' . $googleMapsLibrary . '"></script>';
        $out .= '<script type="text/javascript">';
        $out .= "var latitude = {$this->latitude};";
        $out .= "var longitude = {$this->longitude};";
        $out .= "var tableName = '{$this->tableName}';";
        $out .= "var latitudeField = '{$this->latFieldName}';";
        $out .= "var longitudeField = '{$this->lonFieldName}';";
        $out .= "var addressId = '{$this->addressId}';";
        $out .= "var idPrefix = '{$this->idPrefix}';";
        $out .= "var version = {$version};";
        $out .= '</script>';
        $out .= '<script type="text/javascript" src="/typo3conf/ext/contacts/Resources/Public/JavaScripts/Backend/google_maps_hook.js"></script>';

        return $out;
    }

    protected function getInputFields(array $params): string
    {
        $address = $this->concatenateFieldsToAddress($params);

        $uid = $params['row']['uid'];

        $htmlIdPrefix = 'tx-contacts-address-' . $uid;

        $out = '';
        $out .= '<div id="' . $htmlIdPrefix . '">';
        $out .= '<input id="' . $htmlIdPrefix . '-address" class="address" type="textbox" value="' . $address . '" style="width:300px">';
        $out .= '<input type="button" value="Search" onclick="TxContacts.codeAddress(' . $uid . ')">';
        $out .= '<div id="' . $htmlIdPrefix . '-map" style="height:300px; width:100%; border: 1px solid #bbbbbb; margin-top: 15px;"></div>';
        $out .= '</div>';

        return $out;
    }

    protected function getMapApiUrl(): string
    {
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        if (!$extensionConfiguration->isMapsUsageEnabled()) {
            throw new \Exception(
                'No map API URL or map API key has been entered. Please check the extension configuration.',
                1775634797
            );
        }

        return $extensionConfiguration->getMapsApiUrl()
            . '&key=' . $extensionConfiguration->getMapsApiKey()
            . '&callback=initTxContacts';
    }

    protected function setLatLon(array $params): void
    {
        $latitude = (float)$params['row'][$this->latFieldName];
        $longitude = (float)$params['row'][$this->lonFieldName];

        if ($latitude && $longitude) {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
        }
    }

    protected function setLatLonFieldNames(array $params): void
    {
        $dataPrefix = 'data[' . $this->tableName . '][' . $params['row']['uid'] . ']';
        if ($params['parameters']['latitude']) {
            $this->latFieldName = $dataPrefix . '[' . $params['parameters']['latitudeField'] . ']';
        }
        if ($params['parameters']['longitude']) {
            $this->lonFieldName = $dataPrefix . '[' . $params['parameters']['longitudeField'] . ']';
        }
    }
}
