# TransGlobalLogistics

database name : transglobal

driver table : CREATE TABLE `transglobal`.`drivers` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `license_no` INT 								 NOT NULL , `dob` DATE NOT NULL , `nic` INT NOT NULL , `avail` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

customer table : CREATE TABLE `transglobal`.`customers` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `dob` DATE NOT NULL , `mobile` VARCHAR(20) NOT NULL , `email` VARCHAR(255) NOT NULL , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `register_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `avail` SMALLINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


users table : CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
