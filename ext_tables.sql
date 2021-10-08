#
# Table structure for table 'tx_globale_domain_model_referenz'
#
CREATE TABLE tx_globale_domain_model_referenz (

	code varchar(10) DEFAULT '' NOT NULL,
	codenr int(10) DEFAULT 0 NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	country varchar(255) DEFAULT '' NOT NULL,
	description text,
	scope text,
	status varchar(255) DEFAULT '' NOT NULL,
	views int(11) DEFAULT '0' NOT NULL,
	images int(11) unsigned NOT NULL default '0',
	slug varchar(2048) DEFAULT '' NOT NULL,
);
