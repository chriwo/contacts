<?php

namespace Extcode\Contacts\Controller;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Contact;
use Extcode\Contacts\Domain\Repository\CategoryRepository;
use Extcode\Contacts\Domain\Repository\ContactRepository;
use Extcode\Contacts\Controller\ActionController as ContactsActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;

class ContactController extends ContactsActionController
{
    public function __construct(
        PageRepository $pageRepository,
        CategoryRepository $categoryRepository,
        protected ContactRepository $contactRepository
    ) {
        parent::__construct($pageRepository, $categoryRepository);
    }

    protected function initializeAction(): void
    {
        if (!empty($GLOBALS['TSFE']) && is_object($GLOBALS['TSFE'])) {
            static $cacheTagsSet = false;

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

        $contacts = $this->contactRepository->findDemanded($demand);

        $this->view->assign('demand', $demand);
        $this->view->assign('contacts', $contacts);
        $this->view->assign('categories', $this->getSelectedCategories($demand));
        return $this->htmlResponse();
    }

    public function showAction(?Contact $contact = null): ResponseInterface
    {
        if (!$contact && (int)$this->settings['contact']) {
            $contact = $this->contactRepository->findByUid((int)$this->settings['contact']);
        }

        $this->view->assign('contact', $contact);

        $this->addCacheTags([$contact]);
        return $this->htmlResponse();
    }

    public function teaserAction(): ResponseInterface
    {
        $contacts = $this->contactRepository->findByUids($this->settings['contactUids']);
        $this->view->assign('contacts', $contacts);

        $this->addCacheTags($contacts);
        return $this->htmlResponse();
    }

    protected function addCacheTags(array $contacts): void
    {
        $cacheTags = [];

        foreach ($contacts as $contact) {
            // cache tag for each product record
            $cacheTags[] = 'tx_contacts_contact_' . $contact->getUid();
        }
        if (count($cacheTags) > 0) {
            $GLOBALS['TSFE']->addCacheTags($cacheTags);
        }
    }
}
