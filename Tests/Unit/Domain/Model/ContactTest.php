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

class ContactTest extends UnitTestCase
{
    protected string $salutation = '';

    protected string $title = '';

    protected string $firstName = '';

    protected string $lastName = '';

    /**
     * @var Contact
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->salutation = 'Salutation';
        $this->title = 'Title';
        $this->firstName = 'FirstName';
        $this->lastName = 'LastName';
        $this->fixture = new Contact(
            $this->salutation,
            $this->title,
            $this->firstName,
            $this->lastName
        );
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getSalutationInitiallyReturnsSalutation(): void
    {
        self::assertSame(
            $this->salutation,
            $this->fixture->getSalutation()
        );
    }

    #[Test]
    public function setSalutationSetsSalutation(): void
    {
        $this->fixture->setSalutation('Salutation new');

        self::assertSame(
            'Salutation new',
            $this->fixture->getSalutation()
        );
    }

    #[Test]
    public function getTitleInitiallyReturnsTitle(): void
    {
        self::assertSame(
            $this->title,
            $this->fixture->getTitle()
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->fixture->setTitle('Title new');

        self::assertSame(
            'Title new',
            $this->fixture->getTitle()
        );
    }

    #[Test]
    public function getFirstNameInitiallyReturnsFirstName(): void
    {
        self::assertSame(
            $this->firstName,
            $this->fixture->getFirstName()
        );
    }

    #[Test]
    public function setFirstNameSetsFirstName(): void
    {
        $this->fixture->setFirstName('Firstname new');

        self::assertSame(
            'Firstname new',
            $this->fixture->getFirstName()
        );
    }

    #[Test]
    public function setFirstNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first name can not be blank.');
        $this->expectExceptionCode(1373525114);

        $this->fixture->setFirstName('');
    }

    #[Test]
    public function getLastNameInitiallyReturnsLastName(): void
    {
        self::assertSame(
            $this->lastName,
            $this->fixture->getLastName()
        );
    }

    #[Test]
    public function setLastNameSetsLastName(): void
    {
        $this->fixture->setLastName('Lastname new');

        self::assertSame(
            'Lastname new',
            $this->fixture->getLastName()
        );
    }

    #[Test]
    public function setLastNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The last name can not be blank.');
        $this->expectExceptionCode(1373525586);

        $this->fixture->setLastName('');
    }

    #[Test]
    public function getBirthdayInitiallyReturnsZero(): void
    {
        self::assertNull(
            $this->fixture->getBirthday()
        );
    }

    #[Test]
    public function setBirthdaySetsBirthday(): void
    {
        $birthdate = new \DateTime('2019-05-05');

        $this->fixture->setBirthday($birthdate);

        self::assertSame(
            $birthdate,
            $this->fixture->getBirthday()
        );
    }

    #[Test]
    public function getTeaserInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getTeaser()
        );
    }

    #[Test]
    public function setTeaserSetsTeaser(): void
    {
        $this->fixture->setTeaser('Teaser');

        self::assertSame(
            'Teaser',
            $this->fixture->getTeaser()
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getDescription()
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->fixture->setDescription('Description');

        self::assertSame(
            'Description',
            $this->fixture->getDescription()
        );
    }

    #[Test]
    public function getMetaDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getMetaDescription()
        );
    }

    #[Test]
    public function setMetaDescriptionSetsMetaDescription(): void
    {
        $this->fixture->setMetaDescription('MetaDescription');

        self::assertSame(
            'MetaDescription',
            $this->fixture->getMetaDescription()
        );
    }
}
