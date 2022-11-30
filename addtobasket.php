<?php
try{
    header('Location: buytuck.php');
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");

    $stmt = $conn->prepare("INSERT INTO Tblbasket (OrderID,TuckID,Quantity) VALUES (null,:item,:quantity)");
    $stmt->bindParam(':item', $_POST["item"]);
    $stmt->bindParam(':quantity', $_POST["quantity"]);
    $stmt->execute();
    $conn=null;
    }
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
?>