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

    #[\PHPUnit\Framework\Attributes\Test]
    public function getTypeInitiallyReturnsDefaultTypes(): void
    {
        $this->assertSame(
            'INTL,POSTAL,PARCEL,WORK',
            $this->fixture->getType()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setValidTypeSetsType(): void
    {
        $this->fixture->setType('DOM');

        $this->assertSame(
            'DOM',
            $this->fixture->getType()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setInvalidTypeThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The type have to be a set of (DOM, INTL, POSTAL, PARCEL, HOME, WORK).');
        $this->expectExceptionCode(1373530255);

        $this->fixture->setType('inValidType');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getStreetInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getStreet()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setStreetSetsStreet(): void
    {
        $this->fixture->setStreet('Street');

        $this->assertSame(
            'Street',
            $this->fixture->getStreet()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getStreetNumberInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getStreetNumber()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setStreetNumberSetsStreetNumber(): void
    {
        $this->fixture->setStreetNumber('Street Number');

        $this->assertSame(
            'Street Number',
            $this->fixture->getStreetNumber()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getAddition1InitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getAddition1()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setAddition1SetsAddition1(): void
    {
        $this->fixture->setAddition1('Addition1');

        $this->assertSame(
            'Addition1',
            $this->fixture->getAddition1()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getAddition2InitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getAddition2()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setAddition1SetsAddition2(): void
    {
        $this->fixture->setAddition2('Addition2');

        $this->assertSame(
            'Addition2',
            $this->fixture->getAddition2()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getZipInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getZip()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setZipSetsZip(): void
    {
        $this->fixture->setZip('ZIP');

        $this->assertSame(
            'ZIP',
            $this->fixture->getZip()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getCityInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getCity()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setCitySetsCity(): void
    {
        $this->fixture->setCity('City');

        $this->assertSame(
            'City',
            $this->fixture->getCity()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getRegionInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getRegion()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setRegionSetsRegion(): void
    {
        $this->fixture->setRegion('Region');

        $this->assertSame(
            'Region',
            $this->fixture->getRegion()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getCountryInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getCountry()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setCountrySetsCountry(): void
    {
        $country = new Country();
        $country->setIso2('de');

        $this->fixture->setCountry($country);

        $this->assertSame(
            $country,
            $this->fixture->getCountry()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getPostBoxInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getPostBox()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setPostBoxSetsPostBox(): void
    {
        $this->fixture->setPostBox('Post Box');

        $this->assertSame(
            'Post Box',
            $this->fixture->getPostBox()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getLatInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getLat()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLatSetsLat(): void
    {
        $this->fixture->setLat('52° 31′ N');

        $this->assertSame(
            '52° 31′ N',
            $this->fixture->getLat()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getLonInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getLon()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLonSetsLon(): void
    {
        $this->fixture->setLon('13° 24′ O');

        $this->assertSame(
            '13° 24′ O',
            $this->fixture->getLon()
        );
    }
}
