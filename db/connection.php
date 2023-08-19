<?php 

try {

    $conn = new PDO("mysql:host=localhost;dbname=tec_task", "root", "");
            // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(Exception $e) {

         if($e->getMessage() == "SQLSTATE[HY000] [1049] Unknown database 'tec_task'") {
           
            // Create Database
            $query = "create database tec_task";      
            $conn = new PDO("mysql:host=localhost;", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($query);
            
            
            // Create Table 
            $queryCreateTable = "CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(191) NOT NULL , `last_name` VARCHAR(191) NOT NULL , `image_path` VARCHAR(191) NOT NULL , `deleted_at` TIMESTAMP NULL , PRIMARY KEY (`id`))";
            $conn = new PDO("mysql:host=localhost;dbname=tec_task", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($queryCreateTable);
         }
    }


?>