ALTER TABLE `payment_gateways`   
	CHANGE `api_key` `api_key` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
	CHANGE `value` `secret_key` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
	ADD COLUMN `rest_key` VARCHAR(100) NOT NULL AFTER `secret_key`;

ALTER TABLE `payment_gateways`
	CHANGE `rest_key` `rest_key` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL;
