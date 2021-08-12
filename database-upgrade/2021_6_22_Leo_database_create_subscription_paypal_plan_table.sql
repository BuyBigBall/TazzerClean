CREATE TABLE `subscription_paypal_plan` (  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` INT(11) NOT NULL,
  `plan_id` VARCHAR(100) NOT NULL,
  `product_id` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `status` VARCHAR(30) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `usage_type` VARCHAR(30) NOT NULL,
  `create_time` DATETIME,
  PRIMARY KEY (`id`) 
);