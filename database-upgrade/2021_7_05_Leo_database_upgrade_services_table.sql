ALTER TABLE `services`   
	CHANGE `serviceamounttype` `serviceamounttype` ENUM('Hourly','Fixed','Per sqft') CHARSET latin1 COLLATE latin1_swedish_ci DEFAULT 'Fixed' NOT NULL COMMENT 'Leo',
  CHARSET=utf8, COLLATE=utf8_general_ci;

UPDATE `services`
	SET serviceamounttype = "Fixed"
	WHERE serviceamounttype = "";