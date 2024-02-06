<?php

namespace Extcode\Contacts\Controller;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Company;
use Extcode\Contacts\Domain\Repository\CategoryRepository;
use Extcode\Contacts\Domain\Repository\CompanyRepository;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;

class CompanyController extends ActionController
{
    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    public function __construct(
        PageRepository $pageRepository,
        CategoryRepository $categoryRepository,
        CompanyRepository $companyRepository
    ) {
        $this->pageRepository = $pageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->companyRepository = $companyRepository;
    }

    protected function initializeAction(): void
    {
        if (!empty($GLOBALS['TSFE']) && is_object($GLOBALS['TSFE'])) {
            static $cacheTagsSet = false;

            /** @var $typoScriptFrontendController \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
            $typoScriptFrontendController = $GLOBALS['TSFE'];
            if (!$cacheTagsSet) {
                $typoScriptFrontendController->addCacheTags(['tx_contacts']);
                $cacheTagsSet = true;
            }
        }
    }

    public function listAction(): void
    {
        $demand = $this->createDemandObjectFromSettings($this->settings);
        $demand->setActionAndClass(__METHOD__, __CLASS__);

        $companies = $this->companyRepository->findDemanded($demand);

        $this->view->assign('demand', $demand);
        $this->view->assign('companies', $companies);
        $this->view->assign('categories', $this->getSelectedCategories($demand));
    }

    public function showAction(Company $company = null): void
    {
        if (!$company && (int)$this->settings['company']) {
            $company = $this->companyRepository->findByUid((int)$this->settings['company']);
        }

        $this->view->assign('company', $company);

        $this->addCacheTags([$company]);
    }

    public function teaserAction(): void
    {
        $companies = $this->companyRepository->findByUids($this->settings['companyUids']);
        $this->view->assign('companies', $companies);

        $this->addCacheTags($companies);
    }

    protected function addCacheTags(array $companies): void
    {
        $cacheTags = [];

        foreach ($companies as $company) {
            // cache tag for each product record
            $cacheTags[] = 'tx_contacts_company_' . $company->getUid();
        }
        if (count($cacheTags) > 0) {
            $GLOBALS['TSFE']->addCacheTags($cacheTags);
        }
    }
}
