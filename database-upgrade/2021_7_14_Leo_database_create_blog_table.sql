CREATE TABLE `blog` (  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `rating` FLOAT(2,1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`) 
);