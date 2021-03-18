# Feegow Challenge

- Download XAMPP from www.apachefriends.org and install it.
- Download this repository
- Copy "web" folder from this repository to "xampp/htdocs/" installation directory
- Open XAMPP Control Panel and click on "Start" on "Apache" and "MySQL" buttons row
- Now you have an PHP server and a MySQL database running on your machine
- Create a table in the database, you have two options:  
    1) Download and install MySQL Workbench:  
      - Click on "Server" -> "Data Import"  
      - Select "Import from Self-Contained File"  
      - Set the "database.sql" file path  
      - Click on "Start Import"
      - Click on the "refresh icon" and check that the "feegow" database was created with the table "schedules"
     
    2) Use the command line (if on Windows, you need to set the full directory "xampp/mysql/bin" in "path" on "environment variables"):  
      - Execute `mysql -u root` on terminal to login on MariaDB  
      - Copy, paste and execute the following commands:  
        ```
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
        ```
- Open the browser and access "localhost/web"