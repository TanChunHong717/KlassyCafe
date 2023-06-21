-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema klassy_cafe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema klassy_cafe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `klassy_cafe` DEFAULT CHARACTER SET utf8 ;
USE `klassy_cafe` ;

-- -----------------------------------------------------
-- Table `klassy_cafe`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`menu` (
  `menu_id` INT NOT NULL AUTO_INCREMENT,
  `menu_name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(250) NULL,
  `category` VARCHAR(45) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `menu_image_path` VARCHAR(100) NULL,
  PRIMARY KEY (`menu_id`))
ENGINE = InnoDB;

INSERT INTO `menu` (`menu_id`, `menu_name`, `description`, `category`, `price`, `menu_image_path`) VALUES
(1, 'Fresh Chicken Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 10.50, 'assets/images/tab-item-01.png'),
(2, 'Orange Juice', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 8.50, 'assets/images/tab-item-02.png'),
(3, 'Fruit Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 9.90, 'assets/images/tab-item-03.png'),
(4, 'Eggs Omelette', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 6.50, 'assets/images/tab-item-04.png'),
(5, 'Dollma Pire', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 5.00, 'assets/images/tab-item-05.png'),
(6, 'Omelette & Cheese', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Breakfast', 4.10, 'assets/images/tab-item-06.png'),
(7, 'Eggs Omelette', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 14.00, 'assets/images/tab-item-04.png'),
(8, 'Dollma Pire', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 18.00, 'assets/images/tab-item-05.png'),
(9, 'Omelette & Cheese', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 22.00, 'assets/images/tab-item-06.png'),
(10, 'Fresh Chicken Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 10.00, 'assets/images/tab-item-01.png'),
(11, 'Orange Juice', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 20.00, 'assets/images/tab-item-02.png'),
(12, 'Fruit Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Lunch', 30.00, 'assets/images/tab-item-03.png'),
(13, 'Fresh Chicken Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 10.50, 'assets/images/tab-item-01.png'),
(14, 'Orange Juice', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 8.50, 'assets/images/tab-item-02.png'),
(15, 'Fruit Salad', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 9.90, 'assets/images/tab-item-03.png'),
(16, 'Eggs Omelette', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 6.50, 'assets/images/tab-item-04.png'),
(17, 'Dollma Pire', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 5.00, 'assets/images/tab-item-05.png'),
(18, 'Omelette & Cheese', 'Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.', 'Dinner', 4.10, 'assets/images/tab-item-06.png');

-- -----------------------------------------------------
-- Table `klassy_cafe`.`table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`table` (
  `table_id` INT NOT NULL AUTO_INCREMENT,
  `table_name` VARCHAR(10) NOT NULL,
  `table_space` INT NOT NULL,
  `table_image_path` VARCHAR(100) NULL,
  PRIMARY KEY (`table_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `klassy_cafe`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `mobile_number` VARCHAR(15) NULL,
  `is_admin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klassy_cafe`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`order` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `table_id` INT NOT NULL,
  `order_amount` DECIMAL(10,2) NOT NULL,
  `order_date` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_order_user_idx` (`user_id` ASC),
  INDEX `fk_order_table_idx` (`table_id` ASC),
  CONSTRAINT `fk_order_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `klassy_cafe`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_order_table`
    FOREIGN KEY (`table_id`)
    REFERENCES `klassy_cafe`.`table` (`table_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klassy_cafe`.`contain`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`contain` (
  `order_id` INT NOT NULL,
  `menu_id` INT NOT NULL,
  PRIMARY KEY (`order_id`, `menu_id`),
  INDEX `fk_contain_menu_idx` (`menu_id` ASC),
  CONSTRAINT `fk_contain_order`
    FOREIGN KEY (`order_id`)
    REFERENCES `klassy_cafe`.`order` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_contain_menu`
    FOREIGN KEY (`menu_id`)
    REFERENCES `klassy_cafe`.`menu` (`menu_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
