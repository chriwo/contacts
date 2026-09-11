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

final class AddressSearchTest extends UnitTestCase
{
    #[Test]
    public function getLatInitiallyReturnsZeroFloat(): void
    {
        $fixture = new AddressSearch();

        self::assertSame(
            0.0,
            $fixture->getLat()
        );
    }

    #[Test]
    public function setLatSetsLat(): void
    {
        $fixture = new AddressSearch();

        $lat = 54.6717825;

        $fixture->setLat($lat);

        self::assertSame(
            $lat,
            $fixture->getLat()
        );
    }

    #[Test]
    public function getLonInitiallyReturnsZeroFloat(): void
    {
        $fixture = new AddressSearch();

        self::assertSame(
            0.0,
            $fixture->getLon()
        );
    }

    #[Test]
    public function setLonSetsLon(): void
    {
        $fixture = new AddressSearch();

        $lon = 13.4308058;

        $fixture->setLon($lon);

        self::assertSame(
            $lon,
            $fixture->getLon()
        );
    }

    #[Test]
    public function getRadiusInitiallyReturnsZeroInt(): void
    {
        $fixture = new AddressSearch();

        self::assertSame(
            0,
            $fixture->getRadius()
        );
    }

    #[Test]
    public function setRadiusSetsRadius(): void
    {
        $fixture = new AddressSearch();

        $radius = 10;

        $fixture->setRadius($radius);

        self::assertSame(
            $radius,
            $fixture->getRadius()
        );
    }

    #[Test]
    public function getPidsInitiallyReturnsEmptyString(): void
    {
        $fixture = new AddressSearch();

        self::assertEmpty(
            $fixture->getPids()
        );
    }

    #[Test]
    public function setPidsSetsPids(): void
    {
        $fixture = new AddressSearch();

        $pids = '10, 30';

        $fixture->setPids($pids);

        self::assertSame(
            $pids,
            $fixture->getPids()
        );
    }

    #[Test]
    public function getSearchStringInitiallyReturnsEmptyString(): void
    {
        $fixture = new AddressSearch();

        self::assertEmpty(
            $fixture->getSearchString()
        );
    }

    #[Test]
    public function setSearchStringSetsSearchString(): void
    {
        $fixture = new AddressSearch();

        $searchString = 'Search String';

        $fixture->setSearchString($searchString);

        self::assertSame(
            $searchString,
            $fixture->getSearchString()
        );
    }

    #[Test]
    public function getOrderByInitiallyReturnsEmptyString(): void
    {
        $fixture = new AddressSearch();

        self::assertEmpty(
            $fixture->getOrderBy()
        );
    }

    #[Test]
    public function setOrderBySetsOrderBy(): void
    {
        $fixture = new AddressSearch();

        $orderBy = 'distance';

        $fixture->setOrderBy($orderBy);

        self::assertSame(
            $orderBy,
            $fixture->getOrderBy()
        );
    }

    #[Test]
    public function getFallbackOrderByInitiallyReturnsEmptyString(): void
    {
        $fixture = new AddressSearch();

        self::assertEmpty(
            $fixture->getFallbackOrderBy()
        );
    }

    #[Test]
    public function setFallbackOrderBySetsFallbackOrderBy(): void
    {
        $fixture = new AddressSearch();

        $fallbackOrderBy = 'title';

        $fixture->setFallbackOrderBy($fallbackOrderBy);

        self::assertSame(
            $fallbackOrderBy,
            $fixture->getFallbackOrderBy()
        );
    }
}
