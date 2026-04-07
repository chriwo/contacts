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

class CountryTest extends UnitTestCase
{
    /**
     * @var Country
     */
    protected $fixture;

    #[\Override]
    public function setUp(): void
    {
        $this->fixture = new Country();
    }

    #[\Override]
    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getIso2InitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getIso2()
        );
    }

    #[Test]
    public function setIso2SetsIso2(): void
    {
        $this->fixture->setIso2('DE');

        self::assertSame(
            'DE',
            $this->fixture->getIso2()
        );
    }

    #[Test]
    public function setIso2WithLessThanTwoDigitThrowsException(): void
    {
        self::expectException(Exception::class);
        self::expectExceptionCode(1395925918);

        $this->fixture->setIso2('D');
    }

    #[Test]
    public function setIso2WithMoreThanTwoDigitThrowsException(): void
    {
        self::expectException(Exception::class);
        self::expectExceptionCode(1395925918);

        $this->fixture->setIso2('DEU');
    }

    #[Test]
    public function getIso3InitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3SetsIso3(): void
    {
        $this->fixture->setIso3('DEU');

        self::assertSame(
            'DEU',
            $this->fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3WithEmptyStringSetsIso3ToEmptyString(): void
    {
        $this->fixture->setIso3('');

        self::assertSame(
            '',
            $this->fixture->getIso3()
        );
    }

    #[Test]
    public function setIso3WithNoEmptyStringAndLessThanThreeDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars. The used iso3 code has 2 char(s).');
        $this->expectExceptionCode(1395925960);

        $this->fixture->setIso3('DE');
    }

    #[Test]
    public function setIso3WithNoEmptyStringAndMoreThanThreeDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars. The used iso3 code has 4 char(s).');
        $this->expectExceptionCode(1395925960);

        $this->fixture->setIso3('DEUT');
    }

    #[Test]
    public function getNameInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getName()
        );
    }

    #[Test]
    public function setNameSetsName(): void
    {
        $this->fixture->setName('Name new');

        self::assertSame(
            'Name new',
            $this->fixture->getName()
        );
    }
}
