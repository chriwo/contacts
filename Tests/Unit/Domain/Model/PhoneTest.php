<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Phone;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

class PhoneTest extends UnitTestCase
{
    /**
     * @var Phone
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->fixture = new Phone();
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getTypeInitiallyReturnsDefaultTypes(): void
    {
        self::assertSame(
            'VOICE',
            $this->fixture->getType()
        );
    }

    #[Test]
    public function setValidTypeSetsType(): void
    {
        $this->fixture->setType('CELL');

        self::assertSame(
            'CELL',
            $this->fixture->getType()
        );
    }

    #[Test]
    public function setInvalidTypeThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The type have to be a set of (PREF, WORK, HOME, VOICE, FAX, MSG, CELL, PAGER, BBS, MODEM, CAR, ISDN, VIDEO).');
        $this->expectExceptionCode(1373531068);

        $this->fixture->setType('inValidType');
    }

    #[Test]
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getNumber()
        );
    }

    #[Test]
    public function setNumberSetsNumber(): void
    {
        $this->fixture->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->fixture->getNumber()
        );
    }
}
