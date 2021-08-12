ALTER TABLE `paypal_payment_gateways`   
	CHANGE `gateway_type` `gateway_type` VARCHAR(20) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  AFTER `id`,
	CHANGE `paypal_appid` `client_id` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  AFTER `gateway_type`,
	CHANGE `paypal_appkey` `secret` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL  AFTER `client_id`;