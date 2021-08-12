ALTER TABLE `services`   
	ADD COLUMN `serviceamounttype` ENUM('Hourly','Fixed','Per sqft') DEFAULT 'Fixed' NOT NULL COMMENT 'Leo' AFTER `admin_verification`,
	ADD COLUMN `metatagdetails` VARCHAR(100) NOT NULL COMMENT 'Leo' AFTER `serviceamounttype`;
