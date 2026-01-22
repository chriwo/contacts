<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model\Dto;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Dto\AddressSearch;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

class AddressSearchTest extends UnitTestCase
{
    /**
     * @var AddressSearch
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->fixture = new AddressSearch();
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getLatInitiallyReturnsZeroFloat(): void
    {
        self::assertSame(
            0.0,
            $this->fixture->getLat()
        );
    }

    #[Test]
    public function setLatSetsLat(): void
    {
        $lat = 54.6717825;

        $this->fixture->setLat($lat);

        self::assertSame(
            $lat,
            $this->fixture->getLat()
        );
    }

    #[Test]
    public function getLonInitiallyReturnsZeroFloat(): void
    {
        self::assertSame(
            0.0,
            $this->fixture->getLon()
        );
    }

    #[Test]
    public function setLonSetsLon(): void
    {
        $lon = 13.4308058;

        $this->fixture->setLon($lon);

        self::assertSame(
            $lon,
            $this->fixture->getLon()
        );
    }

    #[Test]
    public function getRadiusInitiallyReturnsZeroInt(): void
    {
        self::assertSame(
            0,
            $this->fixture->getRadius()
        );
    }

    #[Test]
    public function setRadiusSetsRadius(): void
    {
        $radius = 10;

        $this->fixture->setRadius($radius);

        self::assertSame(
            $radius,
            $this->fixture->getRadius()
        );
    }

    #[Test]
    public function getPidsInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getPids()
        );
    }

    #[Test]
    public function setPidsSetsPids(): void
    {
        $pids = '10, 30';

        $this->fixture->setPids($pids);

        self::assertSame(
            $pids,
            $this->fixture->getPids()
        );
    }

    #[Test]
    public function getSearchStringInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getSearchString()
        );
    }

    #[Test]
    public function setSearchStringSetsSearchString(): void
    {
        $searchString = 'Search String';

        $this->fixture->setSearchString($searchString);

        self::assertSame(
            $searchString,
            $this->fixture->getSearchString()
        );
    }

    #[Test]
    public function getOrderByInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getOrderBy()
        );
    }

    #[Test]
    public function setOrderBySetsOrderBy(): void
    {
        $orderBy = 'distance';

        $this->fixture->setOrderBy($orderBy);

        self::assertSame(
            $orderBy,
            $this->fixture->getOrderBy()
        );
    }

    #[Test]
    public function getFallbackOrderByInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getFallbackOrderBy()
        );
    }

    #[Test]
    public function setFallbackOrderBySetsFallbackOrderBy(): void
    {
        $fallbackOrderBy = 'title';

        $this->fixture->setFallbackOrderBy($fallbackOrderBy);

        self::assertSame(
            $fallbackOrderBy,
            $this->fixture->getFallbackOrderBy()
        );
    }
}
