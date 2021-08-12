CREATE TABLE `send_proposal_coworkers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_id` varchar(20) NOT NULL,
  `provider_id` varchar(20) NOT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `accepted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ;

