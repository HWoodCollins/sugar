<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
$stmt = $conn->prepare("SELECT * FROM tbluser WHERE username =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    echo("sfdg");
    $hashed= $row['Password'];
    $attempt= $_POST['Pword'];
    if(password_verify($attempt,$hashed)){
        echo("Successful");
        $_SESSION['loggedinID']=$row["UserID"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "menu.php";
        }else{
            $backURL=$_SESSION['backURL'];
        }
        
        header('Location: ' . $backURL);
        unset($_SESSION['backURL']);
        
        
    }else{
        header('Location: login.php');
    }
}
  } else {
    header('Location: login.php');
  }

$conn=null;
?>

<?php
session_start(); 
if (!isset($_SESSION['loggedinID']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}
?>