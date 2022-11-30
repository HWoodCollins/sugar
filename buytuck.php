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

<form action="addtobasket.php" method="POST">
    
	<select name = "item">
		<?php
			include_once('connection.php');
			$stmt = $conn->prepare("SELECT * FROM Tbltuck ORDER BY TuckID ASC");
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo('<option value='.$row["TuckID"].'>'.$row["Tuckname"].'</option>');
			}

			//send through tuckname, tuck price

		?>
		<input type="int" name="quantity"><br>
	</select>

	<input type="submit" value="Add to Basket">

</form>

<?php
$stmt = $conn->prepare("SELECT * FROM Tblbasket");
$stmt->execute();
echo("<br>"."<br>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["Tuckname"].' - £'.$row["Price"].' - '.$row["Quantity"]."<br>");}
?>

<a href="menu.php">Menu</a>
<a href="logout.php">Log Out</a>
</body>
</html>