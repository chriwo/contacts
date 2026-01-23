<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Company;
use InvalidArgumentException;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

class CompanyTest extends UnitTestCase
{
    protected string $name = '';

    /**
     * @var Company
     */
    protected $fixture;

    public function setUp(): void
    {
        $this->name = 'Name';

        $this->fixture = new Company($this->name);
    }

    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getNameInitiallyReturnsName(): void
    {
        self::assertSame(
            $this->name,
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

    #[Test]
    public function setNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The name can not be blank.');
        $this->expectExceptionCode(1373527548);

        $this->fixture->setName('');
    }

    #[Test]
    public function getLegalNameInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getLegalName()
        );
    }

    #[Test]
    public function setLegalNameSetsLegalName(): void
    {
        $this->fixture->setLegalName('LegalName');

        self::assertSame(
            'LegalName',
            $this->fixture->getLegalName()
        );
    }

    #[Test]
    public function getLegalFormInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getLegalForm()
        );
    }

    #[Test]
    public function setLegalFormSetsLegalForm(): void
    {
        $this->fixture->setLegalForm('LegalForm');

        self::assertSame(
            'LegalForm',
            $this->fixture->getLegalForm()
        );
    }

    #[Test]
    public function getRegisteredOfficeInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getRegisteredOffice()
        );
    }

    #[Test]
    public function setRegisteredOfficeSetsRegisteredOffice(): void
    {
        $this->fixture->setRegisteredOffice('RegisteredOffice');

        self::assertSame(
            'RegisteredOffice',
            $this->fixture->getRegisteredOffice()
        );
    }

    #[Test]
    public function getRegisterCourtInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getRegisterCourt()
        );
    }

    #[Test]
    public function setRegisterCourtSetsRegisterCourt(): void
    {
        $this->fixture->setRegisterCourt('RegisterCourt');

        self::assertSame(
            'RegisterCourt',
            $this->fixture->getRegisterCourt()
        );
    }

    #[Test]
    public function getRegisterNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getRegisterNumber()
        );
    }

    #[Test]
    public function setRegisterNumberSetsRegisterNumber(): void
    {
        $this->fixture->setRegisterNumber('RegisterNumber');

        self::assertSame(
            'RegisterNumber',
            $this->fixture->getRegisterNumber()
        );
    }

    #[Test]
    public function getVatIdInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getVatId()
        );
    }

    #[Test]
    public function setVatIdSetsVatId(): void
    {
        $this->fixture->setVatId('VatId');

        self::assertSame(
            'VatId',
            $this->fixture->getVatId()
        );
    }

    #[Test]
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getEmail()
        );
    }

    #[Test]
    public function setEmailSetsEmail(): void
    {
        $this->fixture->setEmail('Email');

        self::assertSame(
            'Email',
            $this->fixture->getEmail()
        );
    }

    #[Test]
    public function getUriInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->fixture->getUri()
        );
    }

    #[Test]
    public function setUriSetsUri(): void
    {
        $this->fixture->setUri('Uri');

        self::assertSame(
            'Uri',
            $this->fixture->getUri()
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
