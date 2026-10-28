<?php

namespace Extcode\Contacts\Controller;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Category;
use Extcode\Contacts\Domain\Model\Dto\Demand;
use Extcode\Contacts\Domain\Repository\CategoryRepository;
use Extcode\Contacts\Utility\ArrayUtility;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ActionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function __construct(
        protected PageRepository $pageRepository,
        protected CategoryRepository $categoryRepository,
    ) {
    }

    /**
     * Create the demand object which define which records will get shown
     *
     * @param mixed[] $settings
     */
    protected function createDemandObjectFromSettings(array $settings): Demand
    {
        $demand = new Demand();
        $this->addCategoriesToDemandObjectFromSettings($demand, $settings);

        $orderByValue = ArrayUtility::getStringValueByPathOrNull($settings, 'orderBy');
        if ($orderByValue !== null) {
            $demand->setOrderBy($orderByValue);
        }

        $filter = ArrayUtility::getArrayValueByPathOrNull($this->request->getArguments(), 'filter');
        if ($filter === null || $filter === []) {
            return $demand;
        }

        $searchFilterValue = ArrayUtility::getStringValueByPathOrNull($filter, 'searchString');
        if ($searchFilterValue !== null) {
            $demand->setSearchString($searchFilterValue);
        }

        $category = ArrayUtility::getStringValueByPathOrNull($filter, 'category');
        if ($category === '0') {
            $demand->setSelectedCategory(0);
        } elseif ((int)$category !== 0 && in_array((int)$category, $demand->getAvailableCategories(), true)) {
            $demand->setSelectedCategory((int)$category);
        }

        return $demand;
    }

    /**
     * @param mixed[] $settings
     */
    protected function addCategoriesToDemandObjectFromSettings(Demand $demand, array $settings): void
    {
        $categoriesList = ArrayUtility::getStringValueByPathOrNull($settings, 'categoriesList');
        if ($categoriesList === null) {
            return;
        }

        $selectedCategories = GeneralUtility::intExplode(',', $categoriesList, true);
        $categories = [];

        $includeSubcategories = ArrayUtility::getBooleanValueByPathOrNull($settings, 'listSubcategories');
        if ($includeSubcategories === true) {
            foreach ($selectedCategories as $selectedCategory) {
                $category = $this->categoryRepository->findByUid($selectedCategory);
                if (!$category instanceof Category) {
                    continue;
                }

                $categories = array_merge(
                    $categories,
                    $this->categoryRepository->findSubcategoriesRecursiveAsArray($category)
                );
            }
        } else {
            $categories = $selectedCategories;
        }

        $demand->setAvailableCategories($categories);
    }

    /**
     * @return array<int, array{uid: int, title: string}>
     */
    protected function getSelectedCategories(Demand $demand): array
    {
        $translatedCategories = [];

        $categories = $this->categoryRepository->findFromDemand($demand);

        foreach ($categories as $category) {
            $category = $this->pageRepository->getLanguageOverlay('sys_category', $category);

            // In case of "strict" language mode
            if ($category === null || $category === []) {
                continue;
            }

            $translatedCategories[] = [
                'uid' => ArrayUtility::getIntegerValueByPath($category, 'uid'),
                'title' => ArrayUtility::getStringValueByPath($category, 'title'),
            ];
        }

        return $translatedCategories;
    }
}
