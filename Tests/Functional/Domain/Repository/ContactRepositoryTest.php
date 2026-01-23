<?php

namespace Extcode\Contacts\Tests\Functional\Domain\Repository;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Dto\Demand;
use Extcode\Contacts\Domain\Repository\ContactRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use PHPUnit\Framework\Attributes\Test;

class ContactRepositoryTest extends FunctionalTestCase
{
    protected ?ContactRepository $contactRepository;

    protected array $testExtensionsToLoad = [
        'extcode/contacts',
    ];

    #[\Override]
    public function setUp(): void
    {
        parent::setUp();
        $this->contactRepository = GeneralUtility::makeInstance(ContactRepository::class);

        $this->importCSVDataSet(__DIR__ . '/../../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../../Fixtures/tx_contacts_domain_model_contact.csv');
    }

    #[\Override]
    public function tearDown(): void
    {
        unset($this->contactRepository);
    }

    #[Test]
    public function findDemandedAndOrderByLastName(): void
    {
        $demand = new Demand();
        $demand->setOrderBy('last_name');

        $querySettings = $this->contactRepository->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->contactRepository->setDefaultQuerySettings($querySettings);
        $companies = $this->contactRepository->findDemanded($demand)->toArray();

        self::assertSame(
            'Doe',
            $companies[0]->getLastName()
        );
        self::assertSame(
            'Doe',
            $companies[1]->getLastName()
        );
        self::assertSame(
            'Dupont',
            $companies[2]->getLastName()
        );
        self::assertSame(
            'Janssen',
            $companies[3]->getLastName()
        );
        self::assertSame(
            'Rossi',
            $companies[7]->getLastName()
        );
    }
}
