

INSERT INTO `office` (`officeid`, `officeloc`) VALUES
(1, 'alex'),
(2, 'cairo'),
(3,'Sharm ELsheikh'),
(4,'Luxor'),
(5,'Hurgada');

INSERT INTO `specs` (`model`, `year`, `cc`) VALUES
('renault megane', 2020, 1600),
('skoda octavia', 2020, 1400),
('Toyota Corolla', 2021,1600),
('Skoda Superb',2020,2000),
('Mercedes Benz', 2020,3000),
('BMW 330i', 2020,2000),
('fiat tipo', 2022, 1600);



INSERT INTO `car` (`plateid`, `model`, `status`, `officeid`, `dailypayment`, `milage`, `color`) VALUES
('aaa1111', 'renault megane', 'active', 1, 50, 0, 'blue'),
('aaa1112', 'renault megane', 'active', 4, 50, 0, 'white'),
('aaa1113', 'skoda octavia', 'active', 1, 200, 100000, 'red'),
('new2020', 'Toyota Corolla', 'active', 2, 500, 50000, 'black'),
('h222120', 'skoda superb', 'active',5, 1000, 75000, 'grey'),
('h212022', 'skoda superb', 'active',1, 1000, 75000, 'black'),
('mer2020', 'Mercedes Benz', 'active', 2, 2000, 30000,'silver'),
('bmw2020', 'BMW 330i', 'active', 3, 3000, 5000,'black'),
('oo1111', 'Mercedes Benz', 'active', 4, 2000, 10000,'blue'),
('fiat2222', 'fiat tipo', 'active',5, 300, 50000,'red');


INSERT INTO `customer` (`ssn`, `fname`, `lname`, `sex`, `email`) VALUES
(30109170201945, 'hend', 'aly', 'female', 'hendaly1792001@gmail.com'),
(30110210202476, 'omar', 'walied', 'male', 'omarcustomer@gmail.com'),
(07062001, 'shereen', 'mabrouk', 'female', 'shereenmabrouk@gmail.com'),
(12062001, 'habiba', 'hefny', 'female','habibahefny@gmail.com'),
(123456,'kylie','jenner','female','kylie@gmail.com'),
(654321,'aly','mohamed','male','alymohamed@gmail.com'),
(04062000,'ahmed','mohamed','male','ahmedmohamed@gmail.com');


INSERT INTO `login` (`email`, `password`) VALUES
('omarcustomer@gmail.com', '1234'),
('hendaly1792001@gmail.com', '1234'),
('shereenmabrouk@gmail.com','1234'),
('habibahefny@gmail.com','12345'),
('kylie@gmail.com','0000'),
('alymohamed@gmail.com','5555'),
('ahmedmohamed@gmail.com', '04062000');



INSERT INTO `reservations` (`plateid`, `customerssn`, `officeid`, `daterental`, `datereturn`, `price`) VALUES
('aaa1112', 30110210202476, 1, '2022-12-27', '2022-12-31', 250);



