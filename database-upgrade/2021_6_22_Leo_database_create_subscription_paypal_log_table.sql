CREATE TABLE `subscription_paypal_log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_token` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `user_type` TINYINT(2) NOT NULL,
  `subscription_id` INT(11) NOT NULL,
  `plan_id` VARCHAR(255) NOT NULL,
  `billingToken` VARCHAR(100) NOT NULL,
  `facilitatorAccessToken` VARCHAR(255) NOT NULL,
  `orderID` VARCHAR(100) NOT NULL,
  `paymentID` VARCHAR(100) NOT NULL,
  `subscriptionID` VARCHAR(100) NOT NULL,
  `create_time` DATETIME,
  PRIMARY KEY (`id`) 
);