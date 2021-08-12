CREATE TABLE `login_history` (  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_token` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `user_type` TINYINT(2) NOT NULL,
  `user_name` VARCHAR(30) NOT NULL,
  `client_ip` VARCHAR(30) NOT NULL,
  `login_time` DATETIME NOT NULL,
  PRIMARY KEY (`id`) 
);
