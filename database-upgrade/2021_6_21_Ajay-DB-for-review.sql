
ALTER TABLE `users` CHANGE `status` `status` INT(1) NOT NULL DEFAULT '2' COMMENT '1-active,2-inactive';

ALTER TABLE `providers` CHANGE `status` `status` INT(11) NOT NULL DEFAULT '2' COMMENT '1-active,2-inactive,0-delete';

CREATE TABLE `send_proposal` (
  `id` int(255) NOT NULL,
  `job_post_id` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `send_proposal_description` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;














