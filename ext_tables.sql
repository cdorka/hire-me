CREATE TABLE `tx_hireme_domain_model_jobposting_category_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);

CREATE TABLE `tx_hireme_domain_model_jobposting_organization_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);


CREATE TABLE `tx_hireme_domain_model_jobposting_location_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);


CREATE TABLE `tx_hireme_domain_model_jobposting_physicalrequirement_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);


CREATE TABLE `tx_hireme_domain_model_jobposting_sensoryrequirement_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);


CREATE TABLE `tx_hireme_domain_model_jobposting_incentive_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);



CREATE TABLE `tx_hireme_domain_model_jobposting_type_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);



CREATE TABLE `tx_hireme_domain_model_jobposting_scope_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);
CREATE TABLE `tx_hireme_domain_model_ttcontent_scope_mm`
(
    `uid`             INT(10) unsigned NOT NULL AUTO_INCREMENT,
    `uid_local`       INT(10) unsigned NOT NULL DEFAULT 0,
    `uid_foreign`     INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting`         INT(10) unsigned NOT NULL DEFAULT 0,
    `sorting_foreign` INT(10) unsigned NOT NULL DEFAULT 0,
    PRIMARY KEY (`uid`),
    KEY `uid_local` (`uid_local`),
    KEY `uid_foreign` (`uid_foreign`)
);
