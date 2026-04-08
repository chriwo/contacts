<?php

use TYPO3\CMS\Core\Resource\FileType;

defined('TYPO3') || die();

return (function () {
    $_LLL_core_general = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf';
    $_LLL_db = 'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf';
    $_LLL_tca = 'LLL:EXT:contacts/Resources/Private/Language/locallang_tca.xlf';

    return [
        'ctrl' => [
            'title' => $_LLL_db . ':tx_contacts_domain_model_company',
            'label' => 'name',
            'tstamp' => 'tstamp',
            'crdate' => 'crdate',
            'editlock' => 'editlock',
            'versioningWS' => true,
            'origUid' => 't3_origuid',
            'languageField' => 'sys_language_uid',
            'transOrigPointerField' => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'searchFields' => 'street,zip,city',
            'typeicon_classes' => [
                'default' => 'contacts-company',
            ],
        ],
        'types' => [
            '1' => [
                'showitem' => '
                fe_user,
                logo,
                --palette--;' . $_LLL_db . ':tx_contacts_domain_model_company.palette.name;name,
                path_segment,
                directors,
                email, uri,
                companies,
                contacts,
                addresses,
                phone_numbers,
                --div--;' . $_LLL_tca . ':tx_contacts_domain_model_company.div.descriptions,
                    teaser,
                    description,
                    meta_description,
                    tt_content,
                --div--;' . $_LLL_tca . ':tx_contacts_domain_model_company.div.categorization,
                    category, categories,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
                    --palette--;' . $_LLL_tca . ':palettes.visibility;hiddenonly,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,
            ',
            ],
        ],
        'palettes' => [
            'name' => [
                'showitem' => '
                    name, --linebreak--,
                    legal_name, legal_form, --linebreak--,
                    registered_office, register_court, register_number, vat_id',
            ],
            'hiddenonly' => [
                'showitem' => 'hidden;' . $_LLL_db . ':tx_contacts_domain_model_company',
            ],
            'access' => [
                'showitem' => '
                    starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                    endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
                    --linebreak--,editlock',
            ],
        ],
        'columns' => [
            'sys_language_uid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
                'config' => ['type' => 'language'],
            ],
            'l10n_parent' => [
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['label' => '', 'value' => 0],
                    ],
                    'foreign_table' => 'tx_contacts_domain_model_company',
                    'foreign_table_where' => 'AND tx_contacts_domain_model_company.pid=###CURRENT_PID### AND tx_contacts_domain_model_company.sys_language_uid IN (-1,0)',
                ],
            ],
            'l10n_diffsource' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'hidden' => [
                'exclude' => true,
                'label' => $_LLL_core_general . ':LGL.hidden',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                ],
            ],
            'starttime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
                'config' => [
                    'type' => 'datetime',
                    'size' => 13,
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                ],
            ],
            'endtime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
                'config' => [
                    'type' => 'datetime',
                    'size' => 13,
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                ],
            ],

            'fe_user' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.fe_user',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'readOnly' => 0,
                    'foreign_table' => 'fe_users',
                    'size' => 1,
                    'items' => [
                        ['label' => '', 'value' => 0],
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                    'eval' => 'int',
                    'default' => 0,
                ],
            ],

            'name' => [
                'exclude' => false,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.name',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                    'required' => true,
                ],
            ],
            'legal_name' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.legal_name',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'legal_form' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.legal_form',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'registered_office' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.registered_office',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'register_court' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.register_court',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'register_number' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.register_number',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'vat_id' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.vat_id',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],

            'path_segment' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.path_segment',
                'config' => [
                    'type' => 'slug',
                    'size' => 50,
                    'generatorOptions' => [
                        'fields' => ['name'],
                        'fieldSeparator' => '-',
                        'replacements' => [
                            '/' => '',
                        ],
                    ],
                    'fallbackCharacter' => '-',
                    'eval' => 'uniqueInSite',
                    'default' => '',
                ],
            ],

            'directors' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.directors',
                'config' => [
                    'type' => 'group',
                    'foreign_table' => 'tx_contacts_domain_model_contact',
                    'allowed' => 'tx_contacts_domain_model_contact',
                    'MM' => 'tx_contacts_domain_model_company_director_mm',
                    'maxitems' => 99,
                    'fieldControl' => [
                        'addRecord' => [
                            'disabled' => false,
                            'renderType' => 'addRecord',
                            'options' => [
                                'title' => 'Definiere ',
                                'setValue' => 'append',
                                'pid' => '###CURRENT_PID###',
                            ],
                        ],
                    ],
                ],
            ],
            'contacts' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.contacts',
                'config' => [
                    'type' => 'group',
                    'foreign_table' => 'tx_contacts_domain_model_contact',
                    'allowed' => 'tx_contacts_domain_model_contact',
                    'MM' => 'tx_contacts_domain_model_contact_company_mm',
                    'maxitems' => 9999,
                    'fieldControl' => [
                        'addRecord' => [
                            'disabled' => false,
                            'renderType' => 'addRecord',
                            'options' => [
                                'title' => 'Definiere ',
                                'setValue' => 'append',
                                'pid' => '###CURRENT_PID###',
                            ],
                        ],
                    ],
                ],
            ],
            'companies' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.companies',
                'config' => [
                    'type' => 'group',
                    'foreign_table' => 'tx_contacts_domain_model_company',
                    'allowed' => 'tx_contacts_domain_model_company',
                    'MM' => 'tx_contacts_domain_model_company_company_mm',
                    'maxitems' => 9999,
                    'fieldControl' => [
                        'addRecord' => [
                            'disabled' => false,
                            'renderType' => 'addRecord',
                            'options' => [
                                'title' => 'Definiere ',
                                'setValue' => 'append',
                                'pid' => '###CURRENT_PID###',
                            ],
                        ],
                    ],
                ],
            ],
            'addresses' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.addresses',
                'config' => [
                    'type' => 'inline',
                    'foreign_table' => 'tx_contacts_domain_model_address',
                    'foreign_field' => 'company',
                    'foreign_sortby' => 'sorting',
                    'maxitems' => 9999,
                    'appearance' => [
                        'collapseAll' => 1,
                        'levelLinksPosition' => 'top',
                        'showSynchronizationLink' => 1,
                        'showPossibleLocalizationRecords' => 1,
                        'showAllLocalizationLink' => 1,
                    ],
                ],
            ],
            'phone_numbers' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.phone_numbers',
                'config' => [
                    'type' => 'inline',
                    'foreign_table' => 'tx_contacts_domain_model_phone',
                    'foreign_field' => 'company',
                    'foreign_sortby' => 'sorting',
                    'maxitems' => 9999,
                    'appearance' => [
                        'collapseAll' => 1,
                        'levelLinksPosition' => 'top',
                        'showSynchronizationLink' => 1,
                        'showPossibleLocalizationRecords' => 1,
                        'showAllLocalizationLink' => 1,
                    ],
                ],
            ],
            'email' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.email',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'uri' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.uri',
                'config' => [
                    'type' => 'link',
                    'size' => 30,
                    'allowedTypes' => ['page', 'file', 'url', 'record', 'telephone'],
                    'appearance' => ['browserTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel'],
                ],
            ],
            'logo' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.logo',
                'config' => [
                    'type' => 'file',
                    'allowed' => 'common-image-types',
                    'maxitems' => 1,
                    'minitems' => 0,
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:file/Resources/Private/Language/locallang.xlf:fileimageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            FileType::IMAGE->value => [
                                'showitem' => '
                                --palette--;LLL:EXT:file/Resources/Private/Language/locallang.xlf:fileimageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
            ],

            'teaser' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.teaser',
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 5,
                    'eval' => 'trim',
                ],
            ],
            'description' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.description',
                'config' => [
                    'type' => 'text',
                    'enableRichtext' => true,
                ],
            ],
            'meta_description' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.meta_description',
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 5,
                    'eval' => 'trim',
                ],
            ],
            'tt_content' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.tt_content',
                'config' => [
                    'type' => 'inline',
                    'foreign_table' => 'tt_content',
                    'foreign_field' => 'tx_contacts_domain_model_company',
                    'foreign_sortby' => 'sorting',
                    'minitems' => 0,
                    'maxitems' => 99,
                    'appearance' => [
                        'levelLinksPosition' => 'top',
                        'showPossibleLocalizationRecords' => true,
                        'showAllLocalizationLink' => true,
                        'showSynchronizationLink' => true,
                        'enabledControls' => [
                            'info' => true,
                            'new' => true,
                            'dragdrop' => false,
                            'sort' => true,
                            'hide' => true,
                            'delete' => true,
                            'localize' => true,
                        ],
                    ],
                    'inline' => [
                        'inlineNewButtonStyle' => 'display: inline-block;',
                    ],
                ],
            ],
            'category' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.category',
                'config' => [
                    'type' => 'category',
                    'foreign_table' => 'sys_category',
                    'foreign_table_where' => ' AND {#sys_category}.{#sys_language_uid} IN (-1, 0)',
                    'maxitems' => 1,
                ],
            ],
            'categories' => [
                'exclude' => true,
                'label' => $_LLL_db . ':tx_contacts_domain_model_company.categories',
                'config' => [
                    'type' => 'category',
                    'foreign_table' => 'sys_category',
                    'foreign_table_where' => ' AND {#sys_category}.{#sys_language_uid} IN (-1, 0)',
                ],
            ],
        ],
    ];
})();
