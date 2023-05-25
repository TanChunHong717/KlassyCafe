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
-- Table `klassy_cafe`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`category` (
  `category_id` INT NOT NULL,
  `category_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `klassy_cafe`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `klassy_cafe`.`menu` (
  `menu_id` INT NOT NULL AUTO_INCREMENT,
  `menu_name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(250) NULL,
  `category` INT NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `menu_image_path` VARCHAR(100) NULL,
  PRIMARY KEY (`menu_id`),
  INDEX `fk_menu_category_idx` (`category` ASC) VISIBLE,
  CONSTRAINT `fk_menu_category`
    FOREIGN KEY (`category`)
    REFERENCES `klassy_cafe`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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
  PRIMARY KEY (`user_id`))
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
  PRIMARY KEY (`order_id`),
  INDEX `fk_order_user_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_order_table_idx` (`table_id` ASC) VISIBLE,
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
  INDEX `fk_contain_menu_idx` (`menu_id` ASC) VISIBLE,
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
