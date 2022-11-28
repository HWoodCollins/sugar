<?php
session_start();
if(isset($_SESSION['loggedinID']))
{
    unset($_SESSION['loggedinID']);
}
header("Location: login.php");
?>
