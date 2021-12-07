<?php

    include("config.php");

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    $sql = 'CREATE TABLE IF NOT EXISTS `users` '
        .'(id int(20) AUTO_INCREMENT,'
        .'username varchar(60),'
        .'password varchar(60),'
        .'firstname varchar(60),'
        .'lastname varchar(60),'
        .'primary key (id))';

    mysqli_query($conn, $sql);

    $sql = 'CREATE TABLE IF NOT EXISTS `orders` '
        .'(`id` int NOT NULL AUTO_INCREMENT,'
        .'`street` varchar(100) DEFAULT NULL,'
        .'`city` varchar(45) DEFAULT NULL,'
        .'`state` varchar(45) DEFAULT NULL,'
        .'`phone` varchar(45) DEFAULT NULL,'
        .'`zipcode` varchar(45) DEFAULT NULL,'
        .'`country` varchar(45) DEFAULT NULL,'
        .'`cardCVV` varchar(45) DEFAULT NULL,'
        .'`cardExpiration` varchar(45) DEFAULT NULL,'
        .'`cardName` varchar(45) DEFAULT NULL,'
        .'`cardNumber` varchar(45) DEFAULT NULL,'
        .'`totalOrder` decimal(11,2) DEFAULT NULL,'
        .'PRIMARY KEY (`id`)'
        .') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;';

    mysqli_query($conn, $sql);

    $sql = 'CREATE TABLE IF NOT EXISTS `order_details`('
        .'`id` int NOT NULL AUTO_INCREMENT,'
        .'`orderid` int NOT NULL,'
        .'`product` varchar(100) NOT NULL,'
        .'`quantity` int NOT NULL,'
        .'`price` decimal(11,2) NOT NULL,'
        .'PRIMARY KEY (`id`)'
        .') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;';

    mysqli_query($conn, $sql);      
    
    $sql = 'CREATE TABLE IF NOT EXISTS rental ('
        .'`car_type` VARCHAR(45) NOT NULL,'
        .'`price` DECIMAL(11,2) NOT NULL,'
        .'PRIMARY KEY (`car_type`));';

    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('SUV', 200.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Compact', 59.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Midsize', 100.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Luxury', 500.99);";
    mysqli_query($conn, $sql);          
?>
