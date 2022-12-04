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
<title>Pupils</title>
    
</head>
<body>
   <h1>MENU</h1>
    <a href="buytuck.php">Create order</a><br>
    <a href="vieworders.php">View orders</a><br>
    <a href="logout.php">Log Out</a>
    <br>
    <br>
    <?php
    if ($_SESSION["Role"]==1){
        echo("<b> Admin Functions </b><br>");
        echo ('<a href="tuck.php">Add Tuck</a><br>');
        echo('<a href="users.php">Add User</a><br><br>');
    }
?>
</body>
</html>

