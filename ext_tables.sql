#
# Table structure for table 'tx_newsletter_recipient'
#
CREATE TABLE tx_newsletter_recipient (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	upuser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	first_name tinytext NOT NULL,
	last_name tinytext NOT NULL,
	email tinytext NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);
