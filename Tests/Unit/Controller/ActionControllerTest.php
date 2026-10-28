<?php

declare(strict_types=1);

namespace Extcode\Contacts\Tests\Unit\Controller;

use Extcode\Contacts\Controller\ActionController;
use Extcode\Contacts\Domain\Model\Dto\Demand;
use Extcode\Contacts\Domain\Repository\CategoryRepository;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

#[CoversClass(ActionController::class)]
final class ActionControllerTest extends UnitTestCase
{
    /**
     * @param array<string, mixed> $settings
     * @param array<string, mixed> $arguments
     */
    private function createDemand(
        array $settings,
        array $arguments,
        ?CategoryRepository $categoryRepository = null,
    ): Demand {
        $subject = new ActionController(
            $this->createMock(PageRepository::class),
            $categoryRepository ?? $this->createMock(CategoryRepository::class),
        );

        $request = $this->createMock(RequestInterface::class);
        $request->method('getArguments')->willReturn($arguments);

        $reflection = new \ReflectionClass($subject);
        $reflection->getProperty('request')->setValue($subject, $request);

        $demand = $reflection->getMethod('createDemandObjectFromSettings')->invoke($subject, $settings);
        self::assertInstanceOf(Demand::class, $demand);

        return $demand;
    }

    #[Test]
    public function withoutFilterArgumentsReturnsDemandWithDefaults(): void
    {
        $demand = $this->createDemand([], []);

        self::assertSame('', $demand->getSearchString());
        self::assertSame(0, $demand->getSelectedCategory());
    }

    #[Test]
    public function orderByFromSettingsIsSet(): void
    {
        $demand = $this->createDemand(['orderBy' => 'name'], []);

        self::assertSame('name', $demand->getOrderBy());
    }

    #[Test]
    public function searchStringFromFilterIsSet(): void
    {
        $demand = $this->createDemand([], ['filter' => ['searchString' => 'Müller']]);

        self::assertSame('Müller', $demand->getSearchString());
    }

    public static function categoryDataProvider(): \Generator
    {
        yield 'category in available list' => ['5', 5];
        yield 'category not in available list' => ['9', 0];
        yield 'category "0" resets' => ['0', 0];
        yield 'non-numeric category' => ['abc', 0];
    }

    #[Test]
    #[DataProvider('categoryDataProvider')]
    public function selectedCategoryIsOnlySetIfAvailable(string $category, int $expected): void
    {
        $demand = $this->createDemand(
            ['categoriesList' => '3,5', 'listSubcategories' => false],
            ['filter' => ['category' => $category]],
        );

        self::assertSame($expected, $demand->getSelectedCategory());
    }

    public static function disabledSubcategoriesDataProvider(): \Generator
    {
        yield 'listSubcategories "0"' => [['listSubcategories' => '0']];
        yield 'listSubcategories not set' => [[]];
    }

    /**
     * @param array<string, mixed> $settings
     */
    #[Test]
    #[DataProvider('disabledSubcategoriesDataProvider')]
    public function subcategoriesAreNotLoadedIfListSubcategoriesIsDisabled(array $settings): void
    {
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $categoryRepository->expects(self::never())->method('findByUid');
        $categoryRepository->expects(self::never())->method('findSubcategoriesRecursiveAsArray');

        $demand = $this->createDemand(
            ['categoriesList' => '3,5'] + $settings,
            [],
            $categoryRepository,
        );

        self::assertSame([3, 5], $demand->getAvailableCategories());
    }
}
