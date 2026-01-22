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

class ContactTest extends UnitTestCase
{
    /**
     * @var string
     */
    protected $salutation;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

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

    #[\PHPUnit\Framework\Attributes\Test]
    public function getSalutationInitiallyReturnsSalutation(): void
    {
        $this->assertSame(
            $this->salutation,
            $this->fixture->getSalutation()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setSalutationSetsSalutation(): void
    {
        $this->fixture->setSalutation('Salutation new');

        $this->assertSame(
            'Salutation new',
            $this->fixture->getSalutation()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getTitleInitiallyReturnsTitle(): void
    {
        $this->assertSame(
            $this->title,
            $this->fixture->getTitle()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setTitleSetsTitle(): void
    {
        $this->fixture->setTitle('Title new');

        $this->assertSame(
            'Title new',
            $this->fixture->getTitle()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getFirstNameInitiallyReturnsFirstName(): void
    {
        $this->assertSame(
            $this->firstName,
            $this->fixture->getFirstName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setFirstNameSetsFirstName(): void
    {
        $this->fixture->setFirstName('Firstname new');

        $this->assertSame(
            'Firstname new',
            $this->fixture->getFirstName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setFirstNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first name can not be blank.');
        $this->expectExceptionCode(1373525114);

        $this->fixture->setFirstName('');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getLastNameInitiallyReturnsLastName(): void
    {
        $this->assertSame(
            $this->lastName,
            $this->fixture->getLastName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLastNameSetsLastName(): void
    {
        $this->fixture->setLastName('Lastname new');

        $this->assertSame(
            'Lastname new',
            $this->fixture->getLastName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLastNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The last name can not be blank.');
        $this->expectExceptionCode(1373525586);

        $this->fixture->setLastName('');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getBirthdayInitiallyReturnsZero(): void
    {
        $this->assertNull(
            $this->fixture->getBirthday()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setBirthdaySetsBirthday(): void
    {
        $birthdate = new \DateTime('2019-05-05');

        $this->fixture->setBirthday($birthdate);

        $this->assertSame(
            $birthdate,
            $this->fixture->getBirthday()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getTeaserInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getTeaser()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setTeaserSetsTeaser(): void
    {
        $this->fixture->setTeaser('Teaser');

        $this->assertSame(
            'Teaser',
            $this->fixture->getTeaser()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getDescription()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->fixture->setDescription('Description');

        $this->assertSame(
            'Description',
            $this->fixture->getDescription()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getMetaDescriptionInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getMetaDescription()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setMetaDescriptionSetsMetaDescription(): void
    {
        $this->fixture->setMetaDescription('MetaDescription');

        $this->assertSame(
            'MetaDescription',
            $this->fixture->getMetaDescription()
        );
    }
}
