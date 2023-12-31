<?php 
session_start();

if ($_COOKIE['user']){$_SESSION['user'] = $_COOKIE['user'];}

$servername = $config['db']['server'];
$username = $config['db']['user'];
$password = $config['db']['password'];

// Create cnctection
$cnct = new mysqli($servername, $username, $password);
// Check cnctection
if ($cnct->cnctect_error) {
	die("cnctection failed: " . $cnct->cnctect_error);
} 

$cnct->set_charset("utf8mb4");

// Створення бази даних
$sql = "CREATE DATABASE IF NOT EXISTS sushiRolls";
if ($cnct->query($sql) === true) {
    echo "Базу даних 'sushiRolls' створено успішно! | ";
} else {
    echo "Помилка при створенні бази даних: " . $cnct->error;
}

// Вибір бази даних
$cnct->select_db('sushiRolls');

// Створення таблиці
$sql = "CREATE TABLE IF NOT EXISTS `orders` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `phone` VARCHAR(16) NOT NULL,
    `sticksNum` VARCHAR(16) NOT NULL,
    `educSticksNum` VARCHAR(16) NOT NULL,
    `peopleNum` VARCHAR(16) NOT NULL,
    `adressHouse` VARCHAR(32) NOT NULL,
    `cityName` VARCHAR(32) NOT NULL,
    `streetName` VARCHAR(32) NOT NULL,
    `buildNum` VARCHAR(16) NOT NULL,
    `entranceNumb` VARCHAR(16) NOT NULL DEFAULT 'none',
    `floorNumb` VARCHAR(16) NOT NULL DEFAULT 'none',
    `apartmentNumb` VARCHAR(32) NOT NULL DEFAULT 'none',
    `userMessage` TEXT CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci' NOT NULL,
    `completed` TINYINT(1) NOT NULL DEFAULT 0,
    `jsonOrders` TEXT NOT NULL,
    `date` DATETIME(6) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;";

if ($cnct->query($sql) === true) {
    echo "Таблицю 'orders' створено успішно!";
} else {
    echo "Помилка при створенні таблиці: " . $cnct->error;
}

?>