#
# Table structure for table 'tx_contacts_domain_model_contact'
#
CREATE TABLE tx_contacts_domain_model_contact (
    path_segment varchar(2048),
    birthday int(11) DEFAULT '0' NOT NULL,
    teaser text NOT NULL,
    description text NOT NULL,
    meta_description text NOT NULL,
    categories int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_contacts_domain_model_company'
#
CREATE TABLE tx_contacts_domain_model_company (
    path_segment varchar(2048),
    teaser text NOT NULL,
    description text NOT NULL,
    meta_description text NOT NULL,
    categories int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_contacts_domain_model_address'
#
CREATE TABLE tx_contacts_domain_model_address (
    path_segment varchar(2048),
    lat double default '0',
    lon double default '0',
);

CREATE TABLE tx_contacts_domain_model_contact_company_mm (
    contact int(11) unsigned DEFAULT '0' NOT NULL,
);
