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
<head>
    <title>Add Tuck</title>
</head>
<body>
       
    <form action="addtuck.php" method = "post">
        Name:<input type="text" name="name"><br>
        Cost:<input type="DEC" name="cost"><br>
        Quantity:<input type="int" name="quantity"><br>
        <input type="submit" value="Add Item">
      </form>      

<a href="menu.php">Menu</a>
<a href="logout.php">Log Out</a>
</body>
</html>

<?php
include_once('connection.php');

$stmt = $conn->prepare("SELECT * FROM Tbltuck");
$stmt->execute();
echo("<br>"."<br>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["Name"].' - £'.$row["Cost"].' - '.$row["Quantity"]."<br>");}
?>