-- DROP DATABASE DB_2900606;

CREATE SCHEMA IF NOT EXISTS `db_2900606` DEFAULT CHARACTER SET utf8 ;
USE `db_2900606` ;

-- -----------------------------------------------------
-- Table `db_2900606`.`ROLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_2900606`.`ROLES` (
  `rol_code` INT NOT NULL AUTO_INCREMENT,
  `rol_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`rol_code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_2900606`.`USUARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_2900606`.`USUARIOS` (
  `rol_code` INT NOT NULL,
  `user_code` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `user_lastname` VARCHAR(100) NOT NULL,
  `user_id` VARCHAR(20) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `user_pass` VARCHAR(200) NOT NULL,
  `user_state` TINYINT NOT NULL,
  PRIMARY KEY (`user_code`),
  INDEX `ind_usuario_roles` (`rol_code` ASC),
  CONSTRAINT `fk_usuario_roles`
    FOREIGN KEY (`rol_code`)
    REFERENCES `db_2900606`.`ROLES` (`rol_code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO ROLES VALUES 
(null, 'admin'),
(null, 'customer'),
(null, 'seller');

INSERT INTO USUARIOS VALUES 
(1, null, 'Pepito', 'Perez', '1234567890', 'pepito@perez.com', sha1('12345'), 1),
(2, null, 'Marinita', 'García', '9876543210', 'marinita@garcia.com', sha1('12345'), 1),
(2, null, 'Vicente', 'Fernández', '7894561230', 'vicente@fernandez.com', sha1('12345'), 0),
(3, null, 'Jorge', 'Negrete', '4567891230', 'jorge@negrete.com', sha1('12345'), 1);