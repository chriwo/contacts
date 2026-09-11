<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Contact;
use InvalidArgumentException;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

final class ContactTest extends UnitTestCase
{
    private const string SALUTATION = 'Salutation';

    private const string TITLE = 'Title';

    private const string FIRST_NAME = 'FirstName';

    private const string LAST_NAME = 'LastName';

    private function createFixture(): Contact
    {
        return new Contact(
            self::SALUTATION,
            self::TITLE,
            self::FIRST_NAME,
            self::LAST_NAME
        );
    }

    #[Test]
    public function getSalutationInitiallyReturnsSalutation(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            self::SALUTATION,
            $fixture->getSalutation()
        );
    }

    #[Test]
    public function setSalutationSetsSalutation(): void
    {
        $fixture = $this->createFixture();
        $fixture->setSalutation('Salutation new');

        self::assertSame(
            'Salutation new',
            $fixture->getSalutation()
        );
    }

    #[Test]
    public function getTitleInitiallyReturnsTitle(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            self::TITLE,
            $fixture->getTitle()
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $fixture = $this->createFixture();
        $fixture->setTitle('Title new');

        self::assertSame(
            'Title new',
            $fixture->getTitle()
        );
    }

    #[Test]
    public function getFirstNameInitiallyReturnsFirstName(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            self::FIRST_NAME,
            $fixture->getFirstName()
        );
    }

    #[Test]
    public function setFirstNameSetsFirstName(): void
    {
        $fixture = $this->createFixture();
        $fixture->setFirstName('Firstname new');

        self::assertSame(
            'Firstname new',
            $fixture->getFirstName()
        );
    }

    #[Test]
    public function setFirstNameWithEmptyStringThrowsException(): void
    {
        $fixture = $this->createFixture();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first name can not be blank.');
        $this->expectExceptionCode(1373525114);

        $fixture->setFirstName('');
    }

    #[Test]
    public function getLastNameInitiallyReturnsLastName(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            self::LAST_NAME,
            $fixture->getLastName()
        );
    }

    #[Test]
    public function setLastNameSetsLastName(): void
    {
        $fixture = $this->createFixture();
        $fixture->setLastName('Lastname new');

        self::assertSame(
            'Lastname new',
            $fixture->getLastName()
        );
    }

    #[Test]
    public function setLastNameWithEmptyStringThrowsException(): void
    {
        $fixture = $this->createFixture();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The last name can not be blank.');
        $this->expectExceptionCode(1373525586);

        $fixture->setLastName('');
    }

    #[Test]
    public function getBirthdayInitiallyReturnsZero(): void
    {
        $fixture = $this->createFixture();

        self::assertNull(
            $fixture->getBirthday()
        );
    }

    #[Test]
    public function setBirthdaySetsBirthday(): void
    {
        $fixture = $this->createFixture();

        $birthdate = new \DateTime('2019-05-05');

        $fixture->setBirthday($birthdate);

        self::assertSame(
            $birthdate,
            $fixture->getBirthday()
        );
    }

    #[Test]
    public function setBirthdayBefore1970(): void
    {
        $fixture = $this->createFixture();

        $birthdate = new \DateTime('1956-05-05');

        $fixture->setBirthday($birthdate);

        self::assertSame(
            $birthdate,
            $fixture->getBirthday()
        );
    }

    #[Test]
    public function getTeaserInitiallyReturnsEmptyString(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            '',
            $fixture->getTeaser()
        );
    }

    #[Test]
    public function setTeaserSetsTeaser(): void
    {
        $fixture = $this->createFixture();
        $fixture->setTeaser('Teaser');

        self::assertSame(
            'Teaser',
            $fixture->getTeaser()
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            '',
            $fixture->getDescription()
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $fixture = $this->createFixture();
        $fixture->setDescription('Description');

        self::assertSame(
            'Description',
            $fixture->getDescription()
        );
    }

    #[Test]
    public function getMetaDescriptionInitiallyReturnsEmptyString(): void
    {
        $fixture = $this->createFixture();

        self::assertSame(
            '',
            $fixture->getMetaDescription()
        );
    }

    #[Test]
    public function setMetaDescriptionSetsMetaDescription(): void
    {
        $fixture = $this->createFixture();
        $fixture->setMetaDescription('MetaDescription');

        self::assertSame(
            'MetaDescription',
            $fixture->getMetaDescription()
        );
    }
}
