<?php
header('Location: users.php');
array_map("htmlspecialchars", $_POST);
include_once("connection.php");
switch($_POST["role"]){
	case "Pupil":
		$role=0;
		break;
	case "Admin":
		$role=1;
		break;
	}
$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Surname,Forename,Password,Wallet,TotSpent,Role)VALUES (null,:surname,:forename,:password,:balance,:totspend,:role)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':password', $_POST["passwd"]);
$stmt->bindParam(':balance', $_POST["balance"]);
$stmt->bindParam(':totspend', $_POST["totspend"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;
?>