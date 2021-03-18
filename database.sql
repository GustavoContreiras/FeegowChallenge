CREATE DATABASE feegow;  
CREATE TABLE `feegow`.`schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;