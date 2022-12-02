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

<h3>Choice/Quantity:</h3>

<!-- <form action="addtobasket.php" method="POST">
    
	<select name = "item">
			<?php
				include_once('connection.php');
				$stmt = $conn->prepare("SELECT * FROM Tbltuck ORDER BY TuckID ASC");
				$stmt->execute();

				while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					echo('<option value='.$row["TuckID"].'>'.$row["Tuckname"].'</option>');
				}
				
			?>
	</select><br>

	<input type="int" name="quantity">
	<br>
	<br>
	<input type="submit" value="Add to Basket">
</form> -->

<?php
$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo'<form action="addtobasket.php" method="post">';
			echo($row["Tuckname"]."<input type='number' name='qty' min='1' max='5' value='1'>
			<input type='submit' value='Add Tuck'> <input type='hidden' name='TuckId' value=".$row['TuckID']."><br></form>");
		}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM Tblbasket");
$stmt->execute();
echo("<br>"."<br>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["TuckID"].' - '.$row["Quantity"]."<br>");}
?>

<br>
<a href="menu.php">Menu</a><br>
<a href="logout.php">Log Out</a>
</body>
</html>