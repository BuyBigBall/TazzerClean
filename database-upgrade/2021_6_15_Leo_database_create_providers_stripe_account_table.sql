CREATE TABLE `providers_stripe_account` (  
  `provider_id` INT(11) NOT NULL,
  `account_id` VARCHAR(100) NOT NULL,
  `country` VARCHAR(5) NOT NULL,
  `default_currency` VARCHAR(5) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `type` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`provider_id`) ,
  UNIQUE INDEX (`account_id`),
  INDEX (`country`),
  INDEX (`email`),
  INDEX (`type`)
);