<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Country;
use TYPO3\CMS\Extbase\Property\Exception;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

final class CountryTest extends UnitTestCase
{
    #[Test]
    public function getIso2InitiallyReturnsEmptyString(): void
    {
        $fixture = new Country();

        self::assertSame(
            '',
            $fixture->getIso2()
        );
    }

    #[Test]
    public function setIso2SetsIso2(): void
    {
        $fixture = new Country();
        $fixture->setIso2('DE');

        self::assertSame(
            'DE',
            $fixture->getIso2()
        );
    }

    #[Test]
    public function setIso2WithLessThanTwoDigitThrowsException(): void
    {
        $fixture = new Country();

        self::expectException(Exception::class);
        self::expectExceptionCode(1395925918);

        $fixture->setIso2('D');
    }

    #[Test]
    public function setIso2WithMoreThanTwoDigitThrowsException(): void
    {
        $fixture = new Country();

        self::expectException(Exception::class);
        self::expectExceptionCode(1395925918);

        $fixture->setIso2('DEU');
    }

    #[Test]
    public function getIso3InitiallyReturnsEmptyString(): void
    {
        $fixture = new Country();

        self::assertSame(
            '',
            $fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3SetsIso3(): void
    {
        $fixture = new Country();
        $fixture->setIso3('DEU');

        self::assertSame(
            'DEU',
            $fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3WithEmptyStringSetsIso3ToEmptyString(): void
    {
        $fixture = new Country();
        $fixture->setIso3('');

        self::assertSame(
            '',
            $fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3WithNoEmptyStringAndLessThanThreeDigitThrowsException(): void
    {
        $fixture = new Country();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars. The used iso3 code has 2 char(s).');
        $this->expectExceptionCode(1395925960);

        $fixture->setIso3('DE');
    }

    #[Test]
    public function setIso3WithNoEmptyStringAndMoreThanThreeDigitThrowsException(): void
    {
        $fixture = new Country();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars. The used iso3 code has 4 char(s).');
        $this->expectExceptionCode(1395925960);

        $fixture->setIso3('DEUT');
    }

    #[Test]
    public function getNameInitiallyReturnsEmptyString(): void
    {
        $fixture = new Country();

        self::assertSame(
            '',
            $fixture->getName()
        );
    }

    #[Test]
    public function setNameSetsName(): void
    {
        $fixture = new Country();
        $fixture->setName('Name new');

        self::assertSame(
            'Name new',
            $fixture->getName()
        );
    }
}
