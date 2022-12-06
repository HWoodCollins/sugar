<?php
session_start(); 
if (!isset($_SESSION['loggedinID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>

<h3>Menu:</h3>
<?php
include_once('connection.php');

$stmt = $conn->prepare("SELECT * FROM Tbltuck");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["Tuckname"].' - £'.$row["Price"].' - Quantity: '.$row["Quantity"]."<br>");}
?>
<br>
<?php
include_once('connection.php');
if (isset($_SESSION["tuck"])){
	echo ("Basket contains ");
	echo count($_SESSION["tuck"]);
	echo (" items<br>");
	echo ("<a href=viewbasket.php>View basket contents</a>");
}

	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo'<form action="addtobasket.php" method="post">';
			echo('<br>'.$row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<input type='number' name='qty' min='1' max='5' value='1'>
			<input type='submit' value='Add Tuck'><input type='hidden' name='TuckId' value=".$row['TuckID']."><br></form>");
		}
?>  
<br> 
<a href="checkout.php">Checkout</a>
<br>
<br>
<a href="menu.php">Menu</a><br>
<a href="logout.php">Log Out</a>
</body>
</html>