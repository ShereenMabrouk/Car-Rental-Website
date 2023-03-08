create database final;

use final;
CREATE TABLE `car` (
  `plateid` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `status` enum('active','out_of_service','rented') DEFAULT NULL,
  `officeid` int(11) NOT NULL,
  `dailypayment` int(11) NOT NULL,
  `milage` int(11) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY(`plateid`)
);


use final;
CREATE TABLE `customer` (
  `ssn` bigint(14) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `sex` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ssn`)
);



use final;
CREATE TABLE `login` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`email`)
);


use final;
CREATE TABLE `office` (
  `officeid` int(11) NOT NULL,
  `officeloc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`officeid`)
);

use final;
CREATE TABLE `reservations` (
  `reservation_number` int(11) NOT NULL AUTO_INCREMENT,
  `plateid` varchar(200) NOT NULL,
  `customerssn` bigint(14) NOT NULL,
  `officeid` int(11) NOT NULL,
  `daterental` date DEFAULT NULL,
  `datereturn` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY(`reservation_number`)
);

DELIMITER $$
CREATE TRIGGER `t1` BEFORE INSERT ON `reservations` FOR EACH ROW SET NEW.price = 
  (
    SELECT 
      ((SELECT DATEDIFF(NEW.datereturn, NEW.daterental))+1)*car.dailypayment
      FROM car
     WHERE NEW.plateid = car.plateid
     LIMIT 1
  )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t2` BEFORE UPDATE ON `reservations` FOR EACH ROW SET NEW.price = 
  (
    SELECT 
      ((SELECT DATEDIFF(NEW.datereturn, NEW.daterental))+1)*car.dailypayment
      FROM car
     WHERE NEW.plateid = car.plateid
     LIMIT 1
  )
$$
DELIMITER ;


use final;
CREATE TABLE `specs` (
  `model` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL
);


ALTER TABLE `car`
  ADD KEY `plateid` (`plateid`),
  ADD KEY `officeid` (`officeid`),
  ADD KEY `model` (`model`),
  ADD KEY `officeid_2` (`officeid`);

ALTER TABLE `customer`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ssn` (`ssn`),
  ADD KEY `email_2` (`email`);

ALTER TABLE `login`
  ADD KEY `email` (`email`);

ALTER TABLE `office`
  ADD KEY `officeid` (`officeid`);

ALTER TABLE `reservations`
  ADD KEY `plateid` (`plateid`),
  ADD KEY `customerssn` (`customerssn`),
  ADD KEY `officeid` (`officeid`);

ALTER TABLE `specs`
  ADD KEY `model` (`model`);


ALTER TABLE `office`
  MODIFY `officeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`model`) REFERENCES `specs` (`model`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`officeid`) REFERENCES `office` (`officeid`);

ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`);

ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`plateid`) REFERENCES `car` (`plateid`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customerssn`) REFERENCES `customer` (`ssn`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`officeid`) REFERENCES `office` (`officeid`);
COMMIT;





