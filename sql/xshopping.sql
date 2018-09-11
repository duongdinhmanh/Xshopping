CREATE TABLE `Products` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`cat_id` INT NOT NULL,
	`name` varchar(100) NOT NULL,
	`image` TEXT NOT NULL,
	`info` TEXT NOT NULL,
	`options` INT NOT NULL,
	`description` TEXT NOT NULL,
	`sale_products` TEXT NOT NULL,
	`location` INT NOT NULL,
	`Post` INT NOT NULL,
	`status` INT NOT NULL,
	`slug` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `category` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar NOT NULL,
	`parent_id` INT NOT NULL,
	`slug` varchar NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `category_Translation` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`category_id` INT NOT NULL,
	`name` varchar NOT NULL,
	`locale` varchar NOT NULL,
	`status` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Order` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`total_amount` FLOAT NOT NULL,
	`total_quantity` INT NOT NULL,
	`order_note` TEXT NOT NULL,
	`payment` INT NOT NULL,
	`transport` INT NOT NULL,
	`name` varchar NOT NULL,
	`address` varchar NOT NULL,
	`phone` varchar NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `User` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar NOT NULL,
	`email` varchar NOT NULL,
	`password` varchar NOT NULL,
	`address` varchar NOT NULL,
	`phone` varchar NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Order_detail` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`products_id` INT NOT NULL,
	`product_qty` INT NOT NULL,
	`product_price` FLOAT NOT NULL,
	`order_id` INT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `images_pro` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`product_id` INT NOT NULL,
	`images` TEXT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `slides` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`link` TEXT NOT NULL,
	`image` TEXT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Post` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar NOT NULL,
	`location` INT NOT NULL,
	`description` TEXT NOT NULL,
	`content` TEXT NOT NULL,
	`status` INT NOT NULL,
	`slug` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `config` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`key` varchar NOT NULL,
	`value` TEXT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pannel` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`images` varchar NOT NULL,
	`link` TEXT NOT NULL,
	`status` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `ProductsTranlation` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Product_id` INT NOT NULL,
	`name` varchar NOT NULL,
	`options` varchar NOT NULL,
	`info` TEXT NOT NULL,
	`description` TEXT NOT NULL,
	`status` INT NOT NULL,
	`locale` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `PostTranslation` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Post_id` INT NOT NULL,
	`title` varchar NOT NULL,
	`description` TEXT NOT NULL,
	`content` TEXT NOT NULL,
	`locale` varchar NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Products` ADD CONSTRAINT `Products_fk0` FOREIGN KEY (`cat_id`) REFERENCES `category`(`id`);

ALTER TABLE `category_Translation` ADD CONSTRAINT `category_Translation_fk0` FOREIGN KEY (`category_id`) REFERENCES `category`(`id`);

ALTER TABLE `Order` ADD CONSTRAINT `Order_fk0` FOREIGN KEY (`user_id`) REFERENCES `User`(`id`);

ALTER TABLE `Order_detail` ADD CONSTRAINT `Order_detail_fk0` FOREIGN KEY (`products_id`) REFERENCES `Products`(`id`);

ALTER TABLE `Order_detail` ADD CONSTRAINT `Order_detail_fk1` FOREIGN KEY (`order_id`) REFERENCES `Order`(`id`);

ALTER TABLE `images_pro` ADD CONSTRAINT `images_pro_fk0` FOREIGN KEY (`product_id`) REFERENCES `Products`(`id`);

ALTER TABLE `ProductsTranlation` ADD CONSTRAINT `ProductsTranlation_fk0` FOREIGN KEY (`Product_id`) REFERENCES `Products`(`id`);

ALTER TABLE `PostTranslation` ADD CONSTRAINT `PostTranslation_fk0` FOREIGN KEY (`Post_id`) REFERENCES `Post`(`id`);

