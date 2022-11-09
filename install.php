<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers 
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(20) NOT NULL,
Wallet DEC(15,2) NOT NULL,
TotSpent DEC(15,2) NOT NULL,
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();
?>

<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblOrders;
CREATE TABLE TblOrders
(OrderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserID INT(4) NOT NULL,
Date DATE NOT NULL,
Proccessed BOOL NOT NULL,
Declined BOOL NOT NULL,
Cancelled BOOL NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
?>

<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBasket;
CREATE TABLE TblBasket
(OrderID INT(4) NOT NULL,
TuckID INT(4) NOT NULL,
Quantity INT(4) NOT NULL,
PRIMARY KEY(OrderID,TuckID))");
$stmt->execute();
$stmt->closeCursor();
?>

<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblTuck;
CREATE TABLE TblTuck
(TuckID INT(4) PRIMARY KEY,
Name VARCHAR(20),
Cost DEC(15,2),
Quantity INT(4))");
$stmt->execute();
$stmt->closeCursor();
?>