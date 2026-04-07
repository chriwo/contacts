<?php

namespace Extcode\Contacts\Tests\Unit\Domain\Model\Dto;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Dto\Demand;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\Test;

class DemandTest extends UnitTestCase
{
    /**
     * @var Demand
     */
    protected $fixture;

    #[\Override]
    public function setUp(): void
    {
        $this->fixture = new Demand();
    }

    #[\Override]
    public function tearDown(): void
    {
        unset($this->fixture);
    }

    #[Test]
    public function getSearchStringInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getSearchString()
        );
    }

    #[Test]
    public function setSearchStringSetsSearchString(): void
    {
        $searchString = 'Search String';

        $this->fixture->setSearchString($searchString);

        self::assertSame(
            $searchString,
            $this->fixture->getSearchString()
        );
    }

    #[Test]
    public function getAvailableCategoriesInitiallyReturnsEmptyArray(): void
    {
        self::assertEmpty(
            $this->fixture->getAvailableCategories()
        );
    }

    #[Test]
    public function setAvailableCategoriesSetsAvailableCategories(): void
    {
        $availableCategories = [2, 4];

        $this->fixture->setAvailableCategories($availableCategories);

        self::assertSame(
            $availableCategories,
            $this->fixture->getAvailableCategories()
        );
    }

    #[Test]
    public function getSelectedCategoryInitiallyReturnsZero(): void
    {
        self::assertSame(
            0,
            $this->fixture->getSelectedCategory()
        );
    }

    #[Test]
    public function setSelectedCategorySetsSelectedCategory(): void
    {
        $selectedCategory = 2;

        $this->fixture->setSelectedCategory($selectedCategory);

        self::assertSame(
            $selectedCategory,
            $this->fixture->getSelectedCategory()
        );
    }
    #[Test]
    public function getActionInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getAction()
        );
    }

    #[Test]
    public function setActionSetsAction(): void
    {
        $action = 'Action Name';

        $this->fixture->setAction($action);

        self::assertSame(
            $action,
            $this->fixture->getAction()
        );
    }

    #[Test]
    public function getClassInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getClass()
        );
    }

    #[Test]
    public function setClassSetsClass(): void
    {
        $class = 'Class Name';

        $this->fixture->setClass($class);

        self::assertSame(
            $class,
            $this->fixture->getClass()
        );
    }

    #[Test]
    public function getOrderByInitiallyReturnsEmptyString(): void
    {
        self::assertEmpty(
            $this->fixture->getOrderBy()
        );
    }

    #[Test]
    public function setOrderBySetsOrderBy(): void
    {
        $orderBy = 'distance';

        $this->fixture->setOrderBy($orderBy);

        self::assertSame(
            $orderBy,
            $this->fixture->getOrderBy()
        );
    }
}
