ALTER TABLE `providers_stripe_account`   
    ADD COLUMN `id` INT(11) NOT NULL AUTO_INCREMENT FIRST,
    ADD COLUMN `user_token` VARCHAR(100) NOT NULL AFTER `id`,
    CHANGE `provider_id` `user_provider_id` INT(11) NOT NULL,
    ADD COLUMN `user_type` TINYINT(2) NOT NULL AFTER `user_provider_id`, 
  DROP PRIMARY KEY,
  ADD PRIMARY KEY (`id`);

RENAME TABLE `providers_stripe_account` TO `stripe_connect_accounts`;

ALTER TABLE `stripe_connect_accounts`   
  ADD UNIQUE INDEX (`user_token`);