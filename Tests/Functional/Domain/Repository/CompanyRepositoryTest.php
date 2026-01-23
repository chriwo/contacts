<?php

namespace Extcode\Contacts\Tests\Functional\Domain\Repository;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Dto\Demand;
use Extcode\Contacts\Domain\Repository\CompanyRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use PHPUnit\Framework\Attributes\Test;

class CompanyRepositoryTest extends FunctionalTestCase
{
    protected ?CompanyRepository $companyRepository;

    protected array $testExtensionsToLoad = [
        'extcode/contacts',
    ];

    #[\Override]
    public function setUp(): void
    {
        parent::setUp();
        $this->companyRepository = GeneralUtility::makeInstance(CompanyRepository::class);

        $this->importCSVDataSet(__DIR__ . '/../../Fixtures/pages.csv');
        $this->importCSVDataSet(__DIR__ . '/../../Fixtures/tx_contacts_domain_model_company.csv');
    }

    #[\Override]
    public function tearDown(): void
    {
        unset($this->companyRepository);
    }

    #[Test]
    public function findDemandedAndOrderByName(): void
    {
        $demand = new Demand();
        $demand->setOrderBy('name');

        $querySettings = $this->companyRepository->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->companyRepository->setDefaultQuerySettings($querySettings);
        $companies = $this->companyRepository->findDemanded($demand)->toArray();

        self::assertSame(
            'Abgeordnetenhaus von Berlin',
            $companies[0]->getName()
        );
        self::assertSame(
            'Bayerischer Landtag',
            $companies[1]->getName()
        );
        self::assertSame(
            'Bremische Bürgerschaft',
            $companies[2]->getName()
        );
        self::assertSame(
            'Landtag von Baden-Württemberg',
            $companies[10]->getName()
        );
        self::assertSame(
            'Thüringer Landtag',
            $companies[15]->getName()
        );
    }
}
