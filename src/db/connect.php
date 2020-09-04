<?php
    $db = mysqli_connect(
        $_ENV['DB_HOST'],
        $_ENV['DB_USERNAME'], 
        $_ENV['DB_PASSWORD'] ? $_ENV['DB_PASSWORD'] : '',
        $_ENV['DB_NAME']
    );

    $sql = "CREATE TABLE IF NOT EXISTS `".$_ENV['DB_NAME']."`.`users` 
    ( `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255), 
    `name` VARCHAR(255), 
    `password` VARCHAR(255) NOT NULL , 
    `location` VARCHAR(255), 
    `company` VARCHAR(255), 
    PRIMARY KEY (`id`))";

    $db->query($sql);
?>