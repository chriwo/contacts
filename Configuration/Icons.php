<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return (function () {
    $icons = [];

    foreach (['address', 'company', 'contact', 'country', 'phone'] as $icon) {
        $icons['contacts-' . $icon] = [
            'provider' => SvgIconProvider::class,
            'source' => 'EXT:contacts/Resources/Public/Icons/tx_contacts_domain_model_' . $icon . '.svg',
        ];
    }

    $icons['module-contacts'] = [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:contacts/Resources/Public/Icons/module_contacts.svg',
    ];

    return $icons;
})();
