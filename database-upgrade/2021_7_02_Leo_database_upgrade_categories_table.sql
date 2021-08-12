ALTER TABLE `categories`   
	ADD COLUMN `unique_id` VARCHAR(100) NOT NULL AFTER `id`,
	ADD COLUMN `description` VARCHAR(1000) NOT NULL AFTER `category_name`,
	ADD COLUMN `icon` VARCHAR(225) NOT NULL AFTER `description`;