ALTER TABLE `subscription_fee`   
	ADD COLUMN `description` VARCHAR(255) NOT NULL AFTER `subscription_name`,
	ADD COLUMN `paypal_request_id` VARCHAR(100) NOT NULL AFTER `status`;