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
use Extcode\Contacts\Controller\ActionController as ContactsActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;

class CompanyController extends ContactsActionController
{
    public function __construct(
        PageRepository $pageRepository,
        CategoryRepository $categoryRepository,
        protected CompanyRepository $companyRepository,
    ) {
        parent::__construct($pageRepository, $categoryRepository);
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

    public function listAction(): ResponseInterface
    {
        $demand = $this->createDemandObjectFromSettings($this->settings);
        $demand->setActionAndClass(__METHOD__, self::class);

        $companies = $this->companyRepository->findDemanded($demand);

        $this->view->assign('demand', $demand);
        $this->view->assign('companies', $companies);
        $this->view->assign('categories', $this->getSelectedCategories($demand));
        return $this->htmlResponse();
    }

    public function showAction(?Company $company = null): ResponseInterface
    {
        if (!$company && (int)$this->settings['company']) {
            $company = $this->companyRepository->findByUid((int)$this->settings['company']);
        }

        $this->view->assign('company', $company);

        $this->addCacheTags([$company]);
        return $this->htmlResponse();
    }

    public function teaserAction(): ResponseInterface
    {
        $companies = $this->companyRepository->findByUids($this->settings['companyUids']);
        $this->view->assign('companies', $companies);

        $this->addCacheTags($companies);
        return $this->htmlResponse();
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
