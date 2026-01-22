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

class CompanyTest extends UnitTestCase
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

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

    #[\PHPUnit\Framework\Attributes\Test]
    public function getNameInitiallyReturnsName(): void
    {
        $this->assertSame(
            $this->name,
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

    #[\PHPUnit\Framework\Attributes\Test]
    public function setNameWithEmptyStringThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The name can not be blank.');
        $this->expectExceptionCode(1373527548);

        $this->fixture->setName('');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getLegalNameInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getLegalName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLegalNameSetsLegalName(): void
    {
        $this->fixture->setLegalName('LegalName');

        $this->assertSame(
            'LegalName',
            $this->fixture->getLegalName()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getLegalFormInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getLegalForm()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setLegalFormSetsLegalForm(): void
    {
        $this->fixture->setLegalForm('LegalForm');

        $this->assertSame(
            'LegalForm',
            $this->fixture->getLegalForm()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getRegisteredOfficeInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getRegisteredOffice()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setRegisteredOfficeSetsRegisteredOffice(): void
    {
        $this->fixture->setRegisteredOffice('RegisteredOffice');

        $this->assertSame(
            'RegisteredOffice',
            $this->fixture->getRegisteredOffice()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getRegisterCourtInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getRegisterCourt()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setRegisterCourtSetsRegisterCourt(): void
    {
        $this->fixture->setRegisterCourt('RegisterCourt');

        $this->assertSame(
            'RegisterCourt',
            $this->fixture->getRegisterCourt()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getRegisterNumberInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getRegisterNumber()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setRegisterNumberSetsRegisterNumber(): void
    {
        $this->fixture->setRegisterNumber('RegisterNumber');

        $this->assertSame(
            'RegisterNumber',
            $this->fixture->getRegisterNumber()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getVatIdInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getVatId()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setVatIdSetsVatId(): void
    {
        $this->fixture->setVatId('VatId');

        $this->assertSame(
            'VatId',
            $this->fixture->getVatId()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getEmail()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setEmailSetsEmail(): void
    {
        $this->fixture->setEmail('Email');

        $this->assertSame(
            'Email',
            $this->fixture->getEmail()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function getUriInitiallyReturnsEmptyString(): void
    {
        $this->assertSame(
            '',
            $this->fixture->getUri()
        );
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function setUriSetsUri(): void
    {
        $this->fixture->setUri('Uri');

        $this->assertSame(
            'Uri',
            $this->fixture->getUri()
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
