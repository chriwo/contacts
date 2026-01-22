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

class AddressTest extends UnitTestCase
{
    /**
     * @var Address
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->fixture = new Address();
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getTypeInitiallyReturnsDefaultTypes(): void
    {
        self::assertSame(
            'INTL,POSTAL,PARCEL,WORK',
            $this->fixture->getType()
        );
    }

    #[Test]
    public function setValidTypeSetsType(): void
    {
        $this->fixture->setType('DOM');

        self::assertSame(
            'DOM',
            $this->fixture->getType()
        );
    }

    #[Test]
    public function setInvalidTypeThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The type have to be a set of (DOM, INTL, POSTAL, PARCEL, HOME, WORK).');
        $this->expectExceptionCode(1373530255);

        $this->fixture->setType('inValidType');
    }

    #[Test]
    public function getStreetInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getStreet()
        );
    }

    #[Test]
    public function setStreetSetsStreet(): void
    {
        $this->fixture->setStreet('Street');

        self::assertSame(
            'Street',
            $this->fixture->getStreet()
        );
    }

    #[Test]
    public function getStreetNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getStreetNumber()
        );
    }

    #[Test]
    public function setStreetNumberSetsStreetNumber(): void
    {
        $this->fixture->setStreetNumber('Street Number');

        self::assertSame(
            'Street Number',
            $this->fixture->getStreetNumber()
        );
    }

    #[Test]
    public function getAddition1InitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getAddition1()
        );
    }

    #[Test]
    public function setAddition1SetsAddition1(): void
    {
        $this->fixture->setAddition1('Addition1');

        self::assertSame(
            'Addition1',
            $this->fixture->getAddition1()
        );
    }

    #[Test]
    public function getAddition2InitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getAddition2()
        );
    }

    #[Test]
    public function setAddition1SetsAddition2(): void
    {
        $this->fixture->setAddition2('Addition2');

        self::assertSame(
            'Addition2',
            $this->fixture->getAddition2()
        );
    }

    #[Test]
    public function getZipInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getZip()
        );
    }

    #[Test]
    public function setZipSetsZip(): void
    {
        $this->fixture->setZip('ZIP');

        self::assertSame(
            'ZIP',
            $this->fixture->getZip()
        );
    }

    #[Test]
    public function getCityInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getCity()
        );
    }

    #[Test]
    public function setCitySetsCity(): void
    {
        $this->fixture->setCity('City');

        self::assertSame(
            'City',
            $this->fixture->getCity()
        );
    }

    #[Test]
    public function getRegionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getRegion()
        );
    }

    #[Test]
    public function setRegionSetsRegion(): void
    {
        $this->fixture->setRegion('Region');

        self::assertSame(
            'Region',
            $this->fixture->getRegion()
        );
    }

    #[Test]
    public function getCountryInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getCountry()
        );
    }

    #[Test]
    public function setCountrySetsCountry(): void
    {
        $country = new Country();
        $country->setIso2('de');

        $this->fixture->setCountry($country);

        self::assertSame(
            $country,
            $this->fixture->getCountry()
        );
    }

    #[Test]
    public function getPostBoxInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getPostBox()
        );
    }

    #[Test]
    public function setPostBoxSetsPostBox(): void
    {
        $this->fixture->setPostBox('Post Box');

        self::assertSame(
            'Post Box',
            $this->fixture->getPostBox()
        );
    }

    #[Test]
    public function getLatInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getLat()
        );
    }

    #[Test]
    public function setLatSetsLat(): void
    {
        $this->fixture->setLat('52° 31′ N');

        self::assertSame(
            '52° 31′ N',
            $this->fixture->getLat()
        );
    }

    #[Test]
    public function getLonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getLon()
        );
    }

    #[Test]
    public function setLonSetsLon(): void
    {
        $this->fixture->setLon('13° 24′ O');

        self::assertSame(
            '13° 24′ O',
            $this->fixture->getLon()
        );
    }
}
