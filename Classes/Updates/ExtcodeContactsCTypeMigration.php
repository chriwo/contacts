<?php

declare(strict_types=1);

namespace Extcode\Contacts\Updates;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('extcodeContactsCTypeMigration')]
final class ExtcodeContactsCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'Migrate "Extcode Contacts" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "Extcode Contacts" plugins are now registered as content element. Update migrates existing records and backend user permissions.';
    }

    /**
     * @return array<string, string>
     */
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'contacts_address' => 'contacts_address',
            'contacts_addressSearch' => 'contacts_addresssearch',
            'contacts_companies' => 'contacts_companies',
            'contacts_companyTeaser' => 'contacts_companyteaser',
            'contacts_contactTeaser' => 'contacts_contactteaser',
            'contacts_contacts' => 'contacts_contacts',
        ];
    }
}
