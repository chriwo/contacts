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

final class PhoneTest extends UnitTestCase
{
    #[Test]
    public function getTypeInitiallyReturnsDefaultTypes(): void
    {
        $fixture = new Phone();

        self::assertSame(
            'VOICE',
            $fixture->getType()
        );
    }

    #[Test]
    public function setValidTypeSetsType(): void
    {
        $fixture = new Phone();

        $fixture->setType('CELL');

        self::assertSame(
            'CELL',
            $fixture->getType()
        );
    }

    #[Test]
    public function setInvalidTypeThrowsException(): void
    {
        $fixture = new Phone();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The type have to be a set of (PREF, WORK, HOME, VOICE, FAX, MSG, CELL, PAGER, BBS, MODEM, CAR, ISDN, VIDEO).');
        $this->expectExceptionCode(1373531068);

        $fixture->setType('inValidType');
    }

    #[Test]
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        $fixture = new Phone();

        self::assertSame(
            '',
            $fixture->getNumber()
        );
    }

    #[Test]
    public function setNumberSetsNumber(): void
    {
        $fixture = new Phone();

        $fixture->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $fixture->getNumber()
        );
    }
}
