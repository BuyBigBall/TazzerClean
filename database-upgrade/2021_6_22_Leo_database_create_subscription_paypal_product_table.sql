CREATE TABLE `subscription_paypal_product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` INT(11) NOT NULL,
  `product_id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `create_time` DATETIME,
  PRIMARY KEY (`id`) 
);