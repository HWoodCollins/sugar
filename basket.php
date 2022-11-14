<?php
header("pupildoessubject.php");
array_map("htmlspecialchars", $_POST);
include_once("connection.php");

$stmt = $conn->prepare("INSERT INTO Tblbasket (OrderID,TuckID,Quantity)VALUES (null,:TuckID,:Quantity)");
$stmt->bindParam(':TuckID', $_POST["item"]);
$stmt->bindParam(':Quantity', $_POST["quantity"]);
$stmt->execute();
$conn=null;
?>