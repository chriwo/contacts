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

class CountryTest extends UnitTestCase
{
    /**
     * @var Country
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->fixture = new Country();
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getIso2InitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getIso2()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso2SetsIso2(): void
    {
        $this->fixture->setIso2('DE');

        $this->assertSame(
            'DE',
            $this->fixture->getIso2()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso2WithLessThanTwoDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso2 code has to have two chars.');
        $this->expectExceptionCode(1395925918);

        $this->fixture->setIso2('DEU');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso2WithMoreThanTwoDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso2 code has to have two chars.');
        $this->expectExceptionCode(1395925918);

        $this->fixture->setIso2('DEU');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getIso3InitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getIso3()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso3SetsIso3(): void
    {
        $this->fixture->setIso3('DEU');

        $this->assertSame(
            'DEU',
            $this->fixture->getIso3()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso3WithEmptyStringSetsIso3ToEmptyString(): void
    {
        $this->fixture->setIso3('');

        $this->assertSame(
            '',
            $this->fixture->getIso3()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso3WithNoEmptyStringAndLessThanThreeDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars.');
        $this->expectExceptionCode(1395925960);

        $this->fixture->setIso3('DE');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setIso3WithNoEmptyStringAndMoreThanThreeDigitThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The iso3 code has to have three chars.');
        $this->expectExceptionCode(1395925960);

        $this->fixture->setIso3('DEUT');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getNameInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setNameSetsName(): void
    {
        $this->fixture->setName('Name new');

        $this->assertSame(
            'Name new',
            $this->fixture->getName()
        );
    }
}
