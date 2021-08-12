ALTER TABLE post_jobs_form ADD COLUMN serviceamounttype VARCHAR(255), ADD COLUMN currency_code VARCHAR(255);

ALTER TABLE send_proposal ADD COLUMN user_id VARCHAR(255) AFTER provider_id;

ALTER TABLE chat_table ADD COLUMN chat_room INT(11) NOT NULL;


CREATE TABLE `chat_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(20) NOT NULL,
  `job_post_id` varchar(20) NOT NULL,
  `proposal_id` varchar(20) NOT NULL,
  `roommates` varchar(1000) DEFAULT NULL,
  `is_group` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);