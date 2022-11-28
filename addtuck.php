<?php
session_start(); 
if (!isset($_SESSION['loggedinID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>

<?php
try{
    header('Location: tuck.php');
    array_map("htmlspecialchars", $_POST);
    include_once("connection.php");

    $stmt = $conn->prepare("INSERT INTO Tbltuck (TuckID,Name,Cost,Quantity)VALUES (null,:name,:cost,:quantity)");
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':cost', $_POST["cost"]);
    $stmt->bindParam(':quantity', $_POST["quantity"]);
    $stmt->execute();
    $conn=null;
    }
catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
?>