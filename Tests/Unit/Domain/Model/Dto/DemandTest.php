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

final class DemandTest extends UnitTestCase
{
    #[Test]
    public function getSearchStringInitiallyReturnsEmptyString(): void
    {
        $fixture = new Demand();

        self::assertEmpty(
            $fixture->getSearchString()
        );
    }

    #[Test]
    public function setSearchStringSetsSearchString(): void
    {
        $fixture = new Demand();

        $searchString = 'Search String';

        $fixture->setSearchString($searchString);

        self::assertSame(
            $searchString,
            $fixture->getSearchString()
        );
    }

    #[Test]
    public function getAvailableCategoriesInitiallyReturnsEmptyArray(): void
    {
        $fixture = new Demand();

        self::assertEmpty(
            $fixture->getAvailableCategories()
        );
    }

    #[Test]
    public function setAvailableCategoriesSetsAvailableCategories(): void
    {
        $fixture = new Demand();

        $availableCategories = [2, 4];

        $fixture->setAvailableCategories($availableCategories);

        self::assertSame(
            $availableCategories,
            $fixture->getAvailableCategories()
        );
    }

    #[Test]
    public function getSelectedCategoryInitiallyReturnsZero(): void
    {
        $fixture = new Demand();

        self::assertSame(
            0,
            $fixture->getSelectedCategory()
        );
    }

    #[Test]
    public function setSelectedCategorySetsSelectedCategory(): void
    {
        $fixture = new Demand();

        $selectedCategory = 2;

        $fixture->setSelectedCategory($selectedCategory);

        self::assertSame(
            $selectedCategory,
            $fixture->getSelectedCategory()
        );
    }
    #[Test]
    public function getActionInitiallyReturnsEmptyString(): void
    {
        $fixture = new Demand();

        self::assertEmpty(
            $fixture->getAction()
        );
    }

    #[Test]
    public function setActionSetsAction(): void
    {
        $fixture = new Demand();

        $action = 'Action Name';

        $fixture->setAction($action);

        self::assertSame(
            $action,
            $fixture->getAction()
        );
    }

    #[Test]
    public function getClassInitiallyReturnsEmptyString(): void
    {
        $fixture = new Demand();

        self::assertEmpty(
            $fixture->getClass()
        );
    }

    #[Test]
    public function setClassSetsClass(): void
    {
        $fixture = new Demand();

        $class = 'Class Name';

        $fixture->setClass($class);

        self::assertSame(
            $class,
            $fixture->getClass()
        );
    }

    #[Test]
    public function getOrderByInitiallyReturnsEmptyString(): void
    {
        $fixture = new Demand();

        self::assertEmpty(
            $fixture->getOrderBy()
        );
    }

    #[Test]
    public function setOrderBySetsOrderBy(): void
    {
        $fixture = new Demand();

        $orderBy = 'distance';

        $fixture->setOrderBy($orderBy);

        self::assertSame(
            $orderBy,
            $fixture->getOrderBy()
        );
    }
}
