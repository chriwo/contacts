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

final class CompanyTest extends UnitTestCase
{
    private const string NAME = 'Name';

    #[Test]
    public function getNameInitiallyReturnsName(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            self::NAME,
            $fixture->getName()
        );
    }

    #[Test]
    public function setNameSetsName(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setName('Name new');

        self::assertSame(
            'Name new',
            $fixture->getName()
        );
    }

    #[Test]
    public function setNameWithEmptyStringThrowsException(): void
    {
        $fixture = new Company(self::NAME);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The name can not be blank.');
        $this->expectExceptionCode(1373527548);

        $fixture->setName('');
    }

    #[Test]
    public function getLegalNameInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getLegalName()
        );
    }

    #[Test]
    public function setLegalNameSetsLegalName(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setLegalName('LegalName');

        self::assertSame(
            'LegalName',
            $fixture->getLegalName()
        );
    }

    #[Test]
    public function getLegalFormInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getLegalForm()
        );
    }

    #[Test]
    public function setLegalFormSetsLegalForm(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setLegalForm('LegalForm');

        self::assertSame(
            'LegalForm',
            $fixture->getLegalForm()
        );
    }

    #[Test]
    public function getRegisteredOfficeInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getRegisteredOffice()
        );
    }

    #[Test]
    public function setRegisteredOfficeSetsRegisteredOffice(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setRegisteredOffice('RegisteredOffice');

        self::assertSame(
            'RegisteredOffice',
            $fixture->getRegisteredOffice()
        );
    }

    #[Test]
    public function getRegisterCourtInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getRegisterCourt()
        );
    }

    #[Test]
    public function setRegisterCourtSetsRegisterCourt(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setRegisterCourt('RegisterCourt');

        self::assertSame(
            'RegisterCourt',
            $fixture->getRegisterCourt()
        );
    }

    #[Test]
    public function getRegisterNumberInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getRegisterNumber()
        );
    }

    #[Test]
    public function setRegisterNumberSetsRegisterNumber(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setRegisterNumber('RegisterNumber');

        self::assertSame(
            'RegisterNumber',
            $fixture->getRegisterNumber()
        );
    }

    #[Test]
    public function getVatIdInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getVatId()
        );
    }

    #[Test]
    public function setVatIdSetsVatId(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setVatId('VatId');

        self::assertSame(
            'VatId',
            $fixture->getVatId()
        );
    }

    #[Test]
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getEmail()
        );
    }

    #[Test]
    public function setEmailSetsEmail(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setEmail('Email');

        self::assertSame(
            'Email',
            $fixture->getEmail()
        );
    }

    #[Test]
    public function getUriInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getUri()
        );
    }

    #[Test]
    public function setUriSetsUri(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setUri('Uri');

        self::assertSame(
            'Uri',
            $fixture->getUri()
        );
    }

    #[Test]
    public function getTeaserInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getTeaser()
        );
    }

    #[Test]
    public function setTeaserSetsTeaser(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setTeaser('Teaser');

        self::assertSame(
            'Teaser',
            $fixture->getTeaser()
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getDescription()
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setDescription('Description');

        self::assertSame(
            'Description',
            $fixture->getDescription()
        );
    }

    #[Test]
    public function getMetaDescriptionInitiallyReturnsEmptyString(): void
    {
        $fixture = new Company(self::NAME);

        self::assertSame(
            '',
            $fixture->getMetaDescription()
        );
    }

    #[Test]
    public function setMetaDescriptionSetsMetaDescription(): void
    {
        $fixture = new Company(self::NAME);
        $fixture->setMetaDescription('MetaDescription');

        self::assertSame(
            'MetaDescription',
            $fixture->getMetaDescription()
        );
    }
}
