<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Address;
use Extcode\Contacts\Domain\Model\Country;
use InvalidArgumentException;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

final class AddressTest extends UnitTestCase
{
    #[Test]
    public function getTypeInitiallyReturnsDefaultTypes(): void
    {
        $fixture = new Address();

        self::assertSame(
            'INTL,POSTAL,PARCEL,WORK',
            $fixture->getType()
        );
    }

    #[Test]
    public function setValidTypeSetsType(): void
    {
        $fixture = new Address();
        $fixture->setType('DOM');

        self::assertSame(
            'DOM',
            $fixture->getType()
        );
    }

    #[Test]
    public function setInvalidTypeThrowsException(): void
    {
        $fixture = new Address();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The type have to be a set of (DOM, INTL, POSTAL, PARCEL, HOME, WORK).');
        $this->expectExceptionCode(1373530255);

        $fixture->setType('inValidType');
    }

    #[Test]
    public function getStreetInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getStreet()
        );
    }

    #[Test]
    public function setStreetSetsStreet(): void
    {
        $fixture = new Address();
        $fixture->setStreet('Street');

        self::assertSame(
            'Street',
            $fixture->getStreet()
        );
    }

    #[Test]
    public function getStreetNumberInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getStreetNumber()
        );
    }

    #[Test]
    public function setStreetNumberSetsStreetNumber(): void
    {
        $fixture = new Address();
        $fixture->setStreetNumber('Street Number');

        self::assertSame(
            'Street Number',
            $fixture->getStreetNumber()
        );
    }

    #[Test]
    public function getAddition1InitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getAddition1()
        );
    }

    #[Test]
    public function setAddition1SetsAddition1(): void
    {
        $fixture = new Address();
        $fixture->setAddition1('Addition1');

        self::assertSame(
            'Addition1',
            $fixture->getAddition1()
        );
    }

    #[Test]
    public function getAddition2InitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getAddition2()
        );
    }

    #[Test]
    public function setAddition1SetsAddition2(): void
    {
        $fixture = new Address();
        $fixture->setAddition2('Addition2');

        self::assertSame(
            'Addition2',
            $fixture->getAddition2()
        );
    }

    #[Test]
    public function getZipInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getZip()
        );
    }

    #[Test]
    public function setZipSetsZip(): void
    {
        $fixture = new Address();
        $fixture->setZip('ZIP');

        self::assertSame(
            'ZIP',
            $fixture->getZip()
        );
    }

    #[Test]
    public function getCityInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getCity()
        );
    }

    #[Test]
    public function setCitySetsCity(): void
    {
        $fixture = new Address();
        $fixture->setCity('City');

        self::assertSame(
            'City',
            $fixture->getCity()
        );
    }

    #[Test]
    public function getRegionInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getRegion()
        );
    }

    #[Test]
    public function setRegionSetsRegion(): void
    {
        $fixture = new Address();
        $fixture->setRegion('Region');

        self::assertSame(
            'Region',
            $fixture->getRegion()
        );
    }

    #[Test]
    public function getCountryInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertNull(
            $fixture->getCountry()
        );
    }

    #[Test]
    public function setCountrySetsCountry(): void
    {
        $fixture = new Address();

        $country = new Country();
        $country->setIso2('de');

        $fixture->setCountry($country);

        self::assertSame(
            $country,
            $fixture->getCountry()
        );
    }

    #[Test]
    public function getPostBoxInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getPostBox()
        );
    }

    #[Test]
    public function setPostBoxSetsPostBox(): void
    {
        $fixture = new Address();
        $fixture->setPostBox('Post Box');

        self::assertSame(
            'Post Box',
            $fixture->getPostBox()
        );
    }

    #[Test]
    public function getLatInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getLat()
        );
    }

    #[Test]
    public function setLatSetsLat(): void
    {
        $fixture = new Address();
        $fixture->setLat('52° 31′ N');

        self::assertSame(
            '52° 31′ N',
            $fixture->getLat()
        );
    }

    #[Test]
    public function getLonInitiallyReturnsEmptyString(): void
    {
        $fixture = new Address();

        self::assertSame(
            '',
            $fixture->getLon()
        );
    }

    #[Test]
    public function setLonSetsLon(): void
    {
        $fixture = new Address();
        $fixture->setLon('13° 24′ O');

        self::assertSame(
            '13° 24′ O',
            $fixture->getLon()
        );
    }
}
