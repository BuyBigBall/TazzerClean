ALTER TABLE `post_jobs_form`   
	CHANGE `user_id` `user_id` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `job_tittle` `job_tittle` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `job_description` `job_description` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `job_type` `job_type` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `skills` `skills` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `amount` `amount` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `serviceamounttype` `serviceamounttype` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	CHANGE `currency_code` `currency_code` VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	ADD COLUMN `created_at` DATETIME NOT NULL AFTER `currency_code`;